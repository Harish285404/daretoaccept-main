<?php

namespace App\Http\Controllers\common;

use App\Http\Controllers\Controller;
use App\Salon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;
use TaylanUnutmaz\AgoraTokenBuilder\RtcTokenBuilder;

class AgoraController extends Controller
{
    public function getToken(Request $request)
    {
        $appId = "YOUR_AGORA_APP_ID";
        $appCertificate = "YOUR_AGORA_APP_CERTIFICATE";
        $channelName = $request->query('channel');
        $uid = rand(1, 230);
        $expirationTimeInSeconds = 86400;
        $currentTimeStamp = time();
        $privilegeExpiredTs = $currentTimeStamp + $expirationTimeInSeconds;
    
        $token = RtcTokenBuilder::buildTokenWithUid($appId, $appCertificate, $channelName, $uid, RtcTokenBuilder::RolePublisher, $privilegeExpiredTs);
    
        // Notify clients using Pusher
        $this->notifyClients('video-call-channel', 'client-video-call-started', [
            'callLink' => url("/room?channel=$channelName&token=$token"),
            'actionValue' => $request->get('reciver_user_id')
        ]);
    
        return response()->json(['token' => $token, 'uid' => $uid]);
    }
    
    public function getTokenSalon(Request $request, $salon)
    {
        $salonInfo = Salon::where('name', $salon)->first();
        $appId = "YOUR_AGORA_APP_ID";
        $appCertificate = "YOUR_AGORA_APP_CERTIFICATE";
        $channelName = $salon;
        $uid = Auth::user()->id;
        $expirationTimeInSeconds = 86400;
        $currentTimeStamp = time();
        $privilegeExpiredTs = $currentTimeStamp + $expirationTimeInSeconds;
    
        $token = RtcTokenBuilder::buildTokenWithUid($appId, $appCertificate, $channelName, $uid, RtcTokenBuilder::RolePublisher, $privilegeExpiredTs);
    
        // Notify clients using Pusher
        $this->notifyClients('video-call-group-' . $salonInfo->name, 'client-group-video-call-started', [
            'callLink' => url("/room?channel={$salonInfo->id}&token=$token"),
            'actionValue' => $request->get('receiver_user_id')
        ]);
    
        return response()->json(['token' => $token, 'uid' => $uid]);
    }
    
    private function notifyClients($channel, $event, $data)
    {
        $pusher = new Pusher(
            config('broadcasting.connections.pusher.key'),
            config('broadcasting.connections.pusher.secret'),
            config('broadcasting.connections.pusher.app_id'),
            [
                'cluster' => config('broadcasting.connections.pusher.options.cluster'),
                'useTLS' => false,
            ]
        );
    
        $pusher->trigger($channel, $event, $data);
    }}
