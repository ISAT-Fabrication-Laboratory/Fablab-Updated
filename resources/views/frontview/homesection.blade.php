@extends('layouts.frontview')

@section('content')
<style>
  img {
    max-width: 100%;
  }

  html {
    scroll-behavior: smooth;
  }

  .gallery {
    padding: 10px 0;
  }

  .gallery img {
    background-color: #ffffff;
    padding: 15px;
    width: 100%;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
    cursor: pointer;
  }

  #gallery-modal .modal-img {
    width: 100%;
  }
</style>

<div class="maintxt ">
  <div class="container d-sm-flex align-items-center justify-content-between">
    <div class="col text-light  mx-5 my-5">
      <h1 class="my-3">
        Where the Quality Fabrications Resonates with Quality Service
      </h1>
      <p>A Fabrication Laboratory Situated in Iloilo City. As a center for design, prototyping
        and modeling, ISAT U-DTI Fablab commits on providing services not only on Fabrication
        but also in trainings and seminars that they can offer.
      </p>
      <a href="#offer"><button type="button" class="btn btn-primary">SEE WHAT WE OFFER!</button></a>
    </div>
    <div class="col float-right img-fluid">
      <img style="width: auto; height:50vh;" src="images/tran1.png" alt="" srcset="">
    </div>

  </div>
</div>
<section class="gallery-card container " id="offer">
  <div class="row text-center my-3" data-aos="fade-up" data-aos-duration="1000">
    <h1>We offer the following services:</h1>

    <!--Card Services-->

    <div class="row d-flex justify-content-evenly my-5" data-aos="fade-up" data-aos-duration="1000" style="background-color: solid white">

      @foreach($services as $data)
      <div class="col-xs-30 col-sm-10 col-md-3 py-3 card
                  border border-1 mx-1 my-3" style="border: grey;
                  padding:2rem;">
        <img src="{{ $data->images }}" class="card-img-top " alt="..." alt="">
        <div class="card-body">
          <h4 class="card-title">{{ $data->name }}</h4>
          <p class="card-text">{{ $data->description }}</p>
        </div>
        <div class="d-flex justify-content-evenly ">
          <button type="button" class="btn btn-outline-primary fw-bold" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Proceed to Consultaion
          </button>
        </div>
      </div>
      @endforeach
    </div>

    <!--Training and Seminars-->

    <div class="container row" data-aos="fade-up" data-aos-duration="1000">
      <div class="row">
        <h1 class="text-center">Training and Seminars</h1>

        <div class="row d-flex justify-content-evenly">

          @foreach($training as $data)  
                  <div class="col-xs-30 col-sm-10 col-md-3 py-3 card
                  border border-1 mx-1 my-3"
                  style="border: grey;
                  padding:2rem;">
                          <img src="{{ $data->images }}"  class="card-img-top " alt="..." alt="">
                          <div class="card-body">
                              <h4 class="card-title">{{ $data->name }}</h4>
                              <p class="card-text">{{ $data->description }}</p>
                          </div>
                          <div class="d-flex justify-content-evenly ">               
                            <button type="button" class="btn btn-outline-primary fw-bold" 
                            data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                              Proceed to Consultaion
                            </button> 
                          </div>
                  </div>
              @endforeach
</section>

<!--Sample Products-->
<section class="gallery min-vh-100 text-center" id="sample">
  <h1 class="container mx-5">Sample Products</h1>
  <div class="container-lg">
    <div class="row gy-4 row-cols-1 row-cols-sm-2 row-cols-md-3">
      <div class="col" data-aos="fade-up" data-aos-duration="1000">
        <img src="images/slider/1.jpg" class="gallery-item" alt="gallery">
      </div>
      <div class="col" data-aos="fade-up" data-aos-duration="1000">
        <img src="images/slider/9.png" class="gallery-item" alt="gallery">
      </div>
      <div class="col" data-aos="fade-up" data-aos-duration="1000">
        <img src="images/slider/17.png" class="gallery-item" alt="gallery">
      </div>
      <div class="col" data-aos="fade-up" data-aos-duration="1000">
        <img src="images/slider/3.jpg" class="gallery-item" alt="gallery">
      </div>
      <div class="col" data-aos="fade-up" data-aos-duration="1000">
        <img src="images/slider/14.png" class="gallery-item" alt="gallery">
      </div>
      <div class="col" data-aos="fade-up" data-aos-duration="1000">
        <img src="images/slider/12.jpg" class="gallery-item" alt="gallery">
      </div>
    </div>
  </div>
</section>

<!---Avail and Add to cart Modal-->

<div class="modal fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-center" style="margin-top: -5px" id="staticBackdropLabel">FabLab <i class="fa-regular fa-bell" style="color:red"></i></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="hidden fixed top-0 right-0 px-2 py-1 sm:block">
          Please
          <a href="{{ url('/login') }}" class="link">LOGIN</a>
          or
          <a href="{{ url('/register') }}" class="link">REGISTER</a>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="gallery-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img src="images/slider/1.jpg" class="modal-img" alt="modal img">
      </div>
    </div>
  </div>
</div>

<!--Achievements-->
<section class="container my-5" id="achievements">
  <div>
    <h1 class="text-center py-5">Achievements</h1>
  </div>
  <div class="text-center">
    <img class="w-50 shadow-lg gallery-item" data-aos="fade-up" data-aos-duration="1000" src="images/certificates/certificate.jpg" alt="CERTIFICATE">
  </div>
  <div class="py-5 " data-aos="fade-up" data-aos-duration="1000">
    <p class="">ISAT U – DTI FabLab grabbed first place and was consequently declared as the people’s choice awardee in the
      recently concluded “Fabsiklaban: Fabricating the New Normal”, held last January 7 – 9, 2021</p>

    <p>The national competition sponsored by the Department of Trade and Industry and DOST’s Advance
      Manufacturing Center (AMCEN) featured thirteen (13) participating fabrication laboratories
      in the country, with each one showcasing their various responses and innovations during this pandemic
      through a 5- minute video.
    <p>

    <p>ISAT U – DTI FabLab was first place in the COVID-19 Response Innovations category which is
      a recognition of its relevant and innovative products as contributions to health workers,
      front liners, LGU’s and other institutions. It was also hailed as the
      “People’s Choice” from among the contestants which clearly shows the support of the public at large</p>

    <p>The other participating FabLabs include, UP Cebu, UP Los Banos, Cebu Technological University –
      Tuburan, USeP DigiHub, CTU – Danao, Fablab BISCAST, Fablab Bohol,
      Fablab Bicol, Fablab DHVTSU, Fablab JHCSC, St. Louis University and Fablab Siquijor State College.</p>
  </div>

</section>



<!--Footer-->
<footer class="bg-light text-center text-lg-start">
  <!-- Copyright -->
  <div class="text-center p-3 text-light" style="background-color: #21364b;">
    © 2022 Copyright:
    <a class="text-light" href="#">ISAT U Fabrication Laboratory</a>
  </div>
  <!-- Copyright -->
</footer>


<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>


<!--Gallery Item Modal-->
<script>
  document.addEventListener("click", function(e) {
    if (e.target.classList.contains("gallery-item")) {
      const src = e.target.getAttribute("src");
      document.querySelector(".modal-img").src = src;
      const myModal = new bootstrap.Modal(document.getElementById('gallery-modal'));
      myModal.show();
    }
  })
</script>
@endsection