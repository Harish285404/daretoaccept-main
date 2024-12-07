@extends('layouts.frontend')

@section('content')
<section class="banner">
      <div class="banner-carousel owl-carousel">
        <div class="items">
          <div
            class="content-wrap"
            style="background-image: {{ url('asset/image.png') }}"
          >
            <div class="container">
              <h1>Dare To Accept: Make A difference</h1>
              <p>
                Why” behind the challenges. Focus on the impact that completing
                a challenge can have—raising funds, solving problems, and
                connecting people.
              </p>
              <a href="" class="ac-btn-blue">Make an Impact Now</a>
            </div>
          </div>
        </div>
        <!-- <div class="items">
          <div
            class="content-wrap"
            style="background-image: {{ url('asset/image.png') }}"
          >
            <div class="container">
              <h1>Dare To Accept: Make A difference</h1>
              <p>
                Why” behind the challenges. Focus on the impact that completing
                a challenge can have—raising funds, solving problems, and
                connecting people.
              </p>
              <a href="" class="ac-btn-blue">Make an Impact Now</a>
            </div>
          </div>
        </div> -->
      </div>
</section>
    <section class="about">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-5">
            <figure>
              <img src="asset/image.png" alt="" />
            </figure>
          </div>
          <div class="col-md-7 about-content d-flex flex-column">
            <h2>About Dare To Accept</h2>
            <p>
              Lorem Ipsum is simply dummy text of the printing and typesetting
              industry. Lorem Ipsum has been the industry's standard dummy text
              ever since the 1500s, when an unknown printer took a galley of
              type and scrambled it to make a type specimen book. It has
              survived not only five centurie
            </p>
            <ul>
              <li>
                Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry's standard dummy
                text ever since the 1500s
              </li>
              <li>
                Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry's standard dummy
                text ever since the 1500s
              </li>
              <li>
                Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry's standard dummy
                text ever since the 1500s
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section class="feature-challange">
      <div class="container">
        <h2 class="text-center">Our Featured Challenges</h2>
        <div class="challange-list">
          <div class="challange-wrap">
            <figure>
              <img src="{{ url('asset/image.png') }}" alt="" />
            </figure>
            <div class="challange-content">
              <h3>
                <a href="">Business To business Challenge</a>
              </h3>
              <p>
                Allows companies to set up challenges against one another or
                collaborate on specific challenges
              </p>
            </div>
          </div>
          <div class="challange-wrap">
            <figure>
              <img src="asset/image.png" alt="" />
            </figure>
            <div class="challange-content">
              <h3>
                <a href="">Business To business Challenge</a>
              </h3>
              <p>
                Allows companies to set up challenges against one another or
                collaborate on specific challenges
              </p>
            </div>
          </div>
          <div class="challange-wrap">
            <figure>
              <img src="{{ url('asset/image.png') }}" alt="" />
            </figure>
            <div class="challange-content">
              <h3>
                <a href="">Business To business Challenge</a>
              </h3>
              <p>
                Allows companies to set up challenges against one another or
                collaborate on specific challenges
              </p>
            </div>
          </div>
          <div class="challange-wrap">
            <figure>
              <img src="{{ url('asset/image.png') }}" alt="" />
            </figure>
            <div class="challange-content">
              <h3>
                <a href="">Business To business Challenge</a>
              </h3>
              <p>
                Allows companies to set up challenges against one another or
                collaborate on specific challenges
              </p>
            </div>
          </div>
          <div class="challange-wrap">
            <figure>
              <img src="{{ url('asset/image.png') }}" alt="" />
            </figure>
            <div class="challange-content">
              <h3>
                <a href="">Business To business Challenge</a>
              </h3>
              <p>
                Allows companies to set up challenges against one another or
                collaborate on specific challenges
              </p>
            </div>
          </div>
          <div class="challange-wrap">
            <figure>
              <img src="{{ url('asset/image.png') }}" alt="" />
            </figure>
            <div class="challange-content">
              <h3>
                <a href="">Business To business Challenge</a>
              </h3>
              <p>
                Allows companies to set up challenges against one another or
                collaborate on specific challenges
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="how-it-works">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-4">
            <h2>How It Works</h2>
          </div>
          <div class="col-md-8">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla
              auctor massa ut metus dictum facilisis. Nunc eget erat ac nunc
              condimentum tempus vitae et dui. Vestibulum sem lorem, cursus id
              interdum et, cursus in lorem. Aliquam hendrerit lacinia mauris, a
              interdum orci aliquet nec.
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="work-wrap">
              <figure>
                <img src="{{ url('asset/icon-1.svg') }}" alt="" />
              </figure>
              <h3>sign up</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla
                auctor massa ut metus dictum facilisis.
              </p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="work-wrap">
              <figure>
                <img src="{{ url('asset/icon-2.svg') }}" alt="" />
              </figure>
              <h3>sign up</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla
                auctor massa ut metus dictum facilisis.
              </p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="work-wrap">
              <figure>
                <img src="{{ url('asset/icon-3.svg') }}" alt="" />
              </figure>
              <h3>sign up</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla
                auctor massa ut metus dictum facilisis.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="faq">
      <div class="container">
        <h2 class="text-center">Frequently Asked Questions</h2>
        <div id="accordion">
          <div class="card">
            <div class="card-header">
              <a class="btn" data-bs-toggle="collapse" href="#collapseOne">
                Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry's standard?
              </a>
            </div>
            <div id="collapseOne" class="collapse" data-bs-parent="#accordion">
              <div class="card-body">
                <p>
                  Lorem Ipsum is simply dummy text of the printing and
                  typesetting industry. Lorem Ipsum has been the industry's
                  standard dummy text ever since the 1500s, when an unknown
                  printer took a galley of type and scrambled it to make a type
                  specimen book. It has survived not only five centuries, but
                  also the leap into electronic typesetting, remaining
                  essentially unchanged
                </p>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <a
                class="collapsed btn"
                data-bs-toggle="collapse"
                href="#collapseTwo"
              >
                Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry's standard?
              </a>
            </div>
            <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
              <div class="card-body">
                <p>
                  Lorem Ipsum is simply dummy text of the printing and
                  typesetting industry. Lorem Ipsum has been the industry's
                  standard dummy text ever since the 1500s, when an unknown
                  printer took a galley of type and scrambled it to make a type
                  specimen book. It has survived not only five centuries, but
                  also the leap into electronic typesetting, remaining
                  essentially unchanged
                </p>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <a
                class="collapsed btn"
                data-bs-toggle="collapse"
                href="#collapseThree"
              >
                Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry's standard?
              </a>
            </div>
            <div
              id="collapseThree"
              class="collapse"
              data-bs-parent="#accordion"
            >
              <div class="card-body">
                <p>
                  Lorem Ipsum is simply dummy text of the printing and
                  typesetting industry. Lorem Ipsum has been the industry's
                  standard dummy text ever since the 1500s, when an unknown
                  printer took a galley of type and scrambled it to make a type
                  specimen book. It has survived not only five centuries, but
                  also the leap into electronic typesetting, remaining
                  essentially unchanged
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="inquiry-form">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-12">
            <h2>Drop Us a Inquiry Below:</h2>
            <p>
              Lorem Ipsum is simply dummy text of the printing and typesetting
              industry. Lorem Ipsum has been the industry's standard dummy text
              ever since the 1500s, when an unknown printer took a galley of
              type and scrambled it to make a type specimen book. It has
              survived not only five centurie
            </p>
            <div class="social-icons">
              <h3>
                Follow us for updates, sneak peeks, and pre-launch challenges!
              </h3>
              <ul class="d-flex align-items-center flex-wrap">
                <li>
                  <a href="">
                    <img src="{{ url('images/facebook.svg') }}" alt="" />
                  </a>
                </li>
                <li>
                  <a href="">
                    <img src="{{ url('images/twitter.svg') }}" alt="" />
                  </a>
                </li>
                <li>
                  <a href="">
                    <img src="{{ url('images/instagram.svg') }}" alt="" />
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-6 col-md-12">
            <form>
              <h3>Get In Touch For More Updates</h3>
              <div class="form-fields">
                <div class="field-wrap">
                  <label>First Name*</label>
                  <input type="text" placeholder="Enter your First Name" />
                </div>
                <div class="field-wrap">
                  <label>Last Name*</label>
                  <input type="text" placeholder="Enter your Last Name" />
                </div>
                <div class="field-wrap">
                  <label>email ID*</label>
                  <input type="text" placeholder="Enter your Email ID" />
                </div>
                <div class="field-wrap">
                  <label>Phone Number*</label>
                  <input type="text" placeholder="Enter your Phone Number" />
                </div>
                <div class="field-wrap w-100">
                  <label>Message*</label>
                  <textarea
                    name=""
                    id=""
                    placeholder="Enter Message"
                  ></textarea>
                </div>
                <input type="submit" value="SEND" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <section class="cta-block">
      <div class="container text-center">
        <h2>Let’s Start The Journey And Complete Challenges</h2>
        <p>
          Lorem Ipsum is simply dummy text of the printing and typesetting
          industry. Lorem Ipsum has been the industry's standard dummy text ever
          since the 1500s, when an unknown printer took a galley of type and
          scrambled it to make a type specimen book. It has survived not only
          five centuries, but also the leap into electronic typesetting,
          remaining essentially unchanged
        </p>
        <a href="" class="ac-btn-blue">Get Started</a>
      </div>
    </section>
@endsection
