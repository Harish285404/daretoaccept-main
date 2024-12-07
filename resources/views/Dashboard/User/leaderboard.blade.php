@extends('layouts.dashboard')

@section('content')
<div class="dash-wrapper">

   
      
        <div class="right-bottom-dash">
            <div class="right-dash-inner">
                <h3>Leaderboard</h3>
                <div class="leader-board">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="leader-board-wrap">
                                <figure>
                                    <img src="{{ url('asset/image.png') }}" alt="">
                                </figure>
                                <div class="leader-board-content">
                                    <h4>Nolan Press</h4>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <img src="{{ url('asset/about_feature_1 1.png') }}" alt="" class="leader-board-tag">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="leader-board-wrap">
                                <figure>
                                    <img src="{{ url('asset/image.png') }}" alt="">
                                </figure>
                                <div class="leader-board-content">
                                    <h4>Nolan Press</h4>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <img src="{{ url('asset/about_feature_1 1.png') }}" alt="" class="leader-board-tag">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="leader-board-wrap">
                                <figure>
                                    <img src="{{ url('asset/image.png') }}" alt="">
                                </figure>
                                <div class="leader-board-content">
                                    <h4>Nolan Press</h4>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <img src="{{ url('asset/about_feature_1 1.png') }}" alt="" class="leader-board-tag">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="info-table mt-4">
                    <table>
                        <thead>
                            <tr>
                                <th>SR.NO</th>
                                <th>Name</th>
                                <th>Challenge Complete</th>
                                <th>Place</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    <div class="stream-info align-items-center">
                                        <figure>
                                            <img src="{{ url('asset/image.png') }}" alt="">
                                        </figure>
                                        <div class="stream-content">
                                            <p>Alex James</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="">100</td>
                                <td><span class="position">1</span></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>
                                    <div class="stream-info align-items-center">
                                        <figure>
                                            <img src="{{ url('asset/image.png') }}" alt="">
                                        </figure>
                                        <div class="stream-content">
                                            <p>Alex James</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="">100</td>
                                <td><span class="position">2</span></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>
                                    <div class="stream-info align-items-center">
                                        <figure>
                                            <img src="{{ url('asset/image.png') }}" alt="">
                                        </figure>
                                        <div class="stream-content">
                                            <p>Alex James</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="">100</td>
                                <td><span class="position">3</span></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>
                                    <div class="stream-info align-items-center">
                                        <figure>
                                            <img src="{{ url('asset/image.png') }}" alt="">
                                        </figure>
                                        <div class="stream-content">
                                            <p>Alex James</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="">100</td>
                                <td><span class="position">4</span></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>
                                    <div class="stream-info align-items-center">
                                        <figure>
                                            <img src="{{ url('asset/image.png') }}" alt="">
                                        </figure>
                                        <div class="stream-content">
                                            <p>Alex James</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="">100</td>
                                <td><span class="position">5</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
</div>

@endsection