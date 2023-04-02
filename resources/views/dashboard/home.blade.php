@extends('layouts.usernavbar')
@section('user_content')
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
                <a href="#services"><button type="button" class="btn btn-primary">SEE WHAT WE OFFER!</button></a>
            </div>
            <div class="col float-right img-fluid">
                <img style="width: auto; height:50vh;" src="images/tran1.png" alt="" srcset="">
            </div>

        </div>
    </div>
    <section data-bs-spy="scroll" class="gallery-card container " id="services">
        <div class="Row text-center " id="services" data-aos="fade-up" data-aos-duration="1000">
            <h1>We offer the following services:</h1>
            <div class="row d-flex justify-content-evenly my-5" data-aos="fade-up" data-aos-duration="1000">
                <!--Cards-->
                @foreach ($services as $data)
                    <div class="col-xs-30 col-sm-10 col-md-3 py-3 card border border-1 mx-1 my-3"
                        style="border: grey; padding:2rem;">
                        <img src="{{ $data->images }}" class="card-img-top " alt="..." alt="">
                        <div class="card-body">
                            <h4 class="card-title">{{ $data->name }}</h4>
                            <p class="card-text">{{ $data->description }}</p>
                        </div>
                        <div class="d-flex justify-content-evenly ">
                            <button type="button" class="btn btn-outline-primary fw-bold" data-bs-toggle="modal"
                                data-bs-target="#consultation_modal_services{{ $data->id }}"> Proceed to
                                Consultation</button>
                        </div>
                    </div>

                    <!-- Services Modal -->
                    <div class="modal fade " id="consultation_modal_services{{ $data->id }}" tabindex="-1"
                        aria-labelledby="consultation_modal_label" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title fs-5" id="consultation_modal_label">Consultation</h2>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body overflow-auto container-fluid">
                                    <form action="{{ url('/consultation_form') }}" id="addservice" method="post"
                                        enctype="multipart/form-data" class="row d-flex justify-content-center ">
                                        @csrf
                                        <div id="row-cloned{{ $data->id }}">
                                            <div class="row-of-form" id="row-of-form{{ $data->id }}">
                                                <!-- Item Name-->
                                                <input type="hidden" name="offers_id" value="{{ $data->id }}">
                                                <input type="hidden" name="user_id" value="{{ session('id') }}">
                                                <input type="hidden" name="type" value="Services">
                                                <div class="row mx-auto">
                                                    <div class="col-sm-11 mx-auto px-0">
                                                        <button class="remove btn btn-danger float-end remove mb-3"
                                                            style="display: none" id="remove{{ $data->id }}">
                                                            <i class="fa fa-close"></i> Remove </button>
                                                    </div>
                                                </div>
                                                <div class="col-sm-11 form-floating mb-3 mx-auto">
                                                    <input class="item_name form-control" id="item_name{{ $data->id }}"
                                                        name="item_name[]" type="text" placeholder="Item name"
                                                        data-sb-validations="required" required />
                                                    <label for="item_name">Item name</label>
                                                    <div class="invalid-feedback" data-sb-feedback="item_name:required">Item
                                                        name is required.</div>
                                                </div>

                                                <!--Description/ Message input -->
                                                <div class="col-sm-11 form-floating mb-3 mx-auto">
                                                    <textarea class="form-control description" name="description[]" id="description{{ $data->id }}" type="text"
                                                        placeholder="Description" style="height: 10rem;" data-sb-validations="required" required></textarea>
                                                    <label for="description">Description</label>
                                                    <div class="invalid-feedback" data-sb-feedback="description:required">
                                                        Description is required.
                                                    </div>
                                                </div>

                                                <!-- Material -->
                                                <div class="col-sm-11 form-floating mb-3 mx-auto">
                                                    <input class="form-control material" name="material[]"
                                                        id="material{{ $data->id }}" type="text"
                                                        placeholder="Item name" data-sb-validations="required" required />
                                                    <label for="material">Material</label>
                                                    <div class="invalid-feedback" data-sb-feedback="material:required">
                                                        Material name is required.</div>
                                                </div>

                                                <!-- Quantity -->
                                                <div class="col-sm-11 form-floating mb-3 mx-auto">
                                                    <input class="form-control quantity" name="quantity[]"
                                                        id="quantity{{ $data->id }}" type="number" min="1"
                                                        placeholder="Quantity" data-sb-validations="required" required />
                                                    <label for="quantity">Quantity</label>
                                                    <div class="invalid-feedback" data-sb-feedback="quantity:required">
                                                        Quantity is required.</div>
                                                </div>

                                                <!-- start and end date -->
                                                <div class=" row d-flex justify-content-center my-1 mb-3 mx-auto">
                                                    <div class="col-sm-5 ">
                                                        <label for="start_date">Start Date</label>
                                                        <input type="date " class="form-control datepicker start_date"
                                                            name="start_date[]" id="start_date{{ $data->id }}"
                                                            type="text" placeholder="mm/dd/yyyy" min="12-12-2022"
                                                            max="12-12-2030" data-sb-validations="required" required />
                                                        <div class="invalid-feedback"
                                                            data-sb-feedback="start_date:required">Starting Date is
                                                            required.</div>
                                                    </div>
                                                    <hr style="width:10%;text-align:center;margin-top:40px">

                                                    <div class="col-sm-5 ">
                                                        <label for="end_date">End date</label>
                                                        <input type="date " class="form-control datepicker end_date"
                                                            name="end_date[]" id="end_date{{ $data->id }}"
                                                            type="text" placeholder="mm/dd/yyyy" min="12-12-2022"
                                                            max="12-12-2030" data-sb-validations="required" required />
                                                        <div class="invalid-feedback"a
                                                            data-sb-feedback="end_date:required">End date is required.
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                        <!---Add and Submit button--->
                                        <div class="d-grid gap-2 col-10 mx-auto mb-1">
                                            <button class="add-item btn btn-secondary"
                                                onclick="add_item_services(<?php echo $data->id; ?>)" type="button">
                                                <i class="fa fa-plus ml-1"></i> Add Item </button>
                                        </div>
                                        <div class="d-grid gap-2 col-10 mx-auto mb-5">
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    </section>

    <section data-bs-spy="scroll" class="gallery-card container " id="training">
        <!--Training and Seminars-->
        <div class="container row" data-aos="fade-up" data-aos-duration="1000" style="margin-top: 80px">
            <div class="row">
                <h1 class="text-center">Training and Seminars</h1>

                <div class="row d-flex justify-content-evenly">

                    @foreach ($training as $data)
                        <div class="col-xs-30 col-sm-10 col-md-3 py-3 card
                  border border-1 mx-1 my-3"
                            style="border: grey;
                  padding:2rem;">
                            <img src="{{ $data->images }}" class="card-img-top">
                            <div class="card-body">
                                <h4 class="card-title">{{ $data->name }}</h4>
                                <p class="card-text">{{ $data->description }}</p>
                            </div>
                            <div class="d-flex justify-content-evenly ">
                                <button type="button" class="btn btn-outline-primary fw-bold" data-bs-toggle="modal"
                                    data-bs-target="#consultation_modal_training{{ $data->id }}"> Proceed to
                                    Consultation</button>
                            </div>
                        </div>

                        <!-- Training Modal -->
                        <div class="modal fade" id="consultation_modal_training{{ $data->id }}" tabindex="-1"
                            aria-labelledby="consultation_modal_label" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title fs-5" id="consultation_modal_label">Consultation</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body overflow-auto container-fluid">
                                        <form action="{{ url('/consultation_form') }}" id="addservice" method="post"
                                            enctype="multipart/form-data" class="row d-flex justify-content-center ">
                                            @csrf
                                            <div id="training-cloned{{ $data->id }}">
                                                <div class="training-form" id="training-form{{ $data->id }}">
                                                    <!-- Item Name-->
                                                    <input type="hidden" name="offers_id" value="{{ $data->id }}">
                                                    <input type="hidden" name="user_id" value="{{ session('id') }}">
                                                    <input type="hidden" name="type" value="Services">
                                                    <div class="row mx-auto">
                                                        <div class="col-sm-11 mx-auto px-0">
                                                            <button class="remove btn btn-danger float-end remove mb-3"
                                                                style="display: none" id="remove{{ $data->id }}">
                                                                <i class="fa fa-close"></i> Remove </button>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-11 form-floating mb-3 mx-auto">
                                                        <input class="training_name form-control"
                                                            id="training_name{{ $data->id }}" name="training_name[]"
                                                            type="text" placeholder="Item name"
                                                            data-sb-validations="required" required />
                                                        <label for="item_name">Item name</label>
                                                        <div class="invalid-feedback"
                                                            data-sb-feedback="item_name:required">Item name is required.
                                                        </div>
                                                    </div>

                                                    <!--Description/ Message input -->
                                                    <div class="col-sm-11 form-floating mb-3 mx-auto">
                                                        <textarea class="form-control training_description" name="training_description[]"
                                                            id="training_description{{ $data->id }}" type="text" placeholder="Description" style="height: 10rem;"
                                                            data-sb-validations="required" required></textarea>
                                                        <label for="description">Description</label>
                                                        <div class="invalid-feedback"
                                                            data-sb-feedback="description:required">Description is
                                                            required.
                                                        </div>
                                                    </div>

                                                    <!-- Material -->
                                                    <div class="col-sm-11 form-floating mb-3 mx-auto">
                                                        <input class="form-control training_material"
                                                            name="training_material[]"
                                                            id="training_material{{ $data->id }}" type="text"
                                                            placeholder="Item name" data-sb-validations="required"
                                                            required />
                                                        <label for="material">Material</label>
                                                        <div class="invalid-feedback"
                                                            data-sb-feedback="material:required">Material name is required.
                                                        </div>
                                                    </div>

                                                    <!-- Quantity -->
                                                    <div class="col-sm-11 form-floating mb-3 mx-auto">
                                                        <input class="form-control training_quantity"
                                                            name="training_quantity[]"
                                                            id="training_quantity{{ $data->id }}" type="number"
                                                            min="1" placeholder="Quantity"
                                                            data-sb-validations="required" required />
                                                        <label for="quantity">Quantity</label>
                                                        <div class="invalid-feedback"
                                                            data-sb-feedback="quantity:required">Quantity is required.
                                                        </div>
                                                    </div>

                                                    <!-- start and end date -->
                                                    <div class=" row d-flex justify-content-center my-1 mb-3 mx-auto">
                                                        <div class="col-sm-5 ">
                                                            <label for="start_date">Start Date</label>
                                                            <input type="date"
                                                                class="form-control datepicker training_start"
                                                                name="training_start[]"
                                                                id="training_start{{ $data->id }}" type="text"
                                                                placeholder="mm/dd/yyyy" min="12-12-2022"
                                                                max="12-12-2030" data-sb-validations="required"
                                                                required />
                                                            <div class="invalid-feedback"
                                                                data-sb-feedback="start_date:required">Starting Date is
                                                                required.</div>
                                                        </div>
                                                        <hr style="width:10%;text-align:center;margin-top:40px">

                                                        <div class="col-sm-5 ">
                                                            <label for="end_date">End date</label>
                                                            <input type="date"
                                                                class="form-control datepicker training_end"
                                                                name="training_end[]"
                                                                id="training_end{{ $data->id }}" type="text"
                                                                placeholder="mm/dd/yyyy" min="12-12-2022"
                                                                max="12-12-2030" data-sb-validations="required"
                                                                required />
                                                            <div class="invalid-feedback"
                                                                data-sb-feedback="end_date:required">End date is required.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>
                                            <!---Add and Submit button--->
                                            <div class="d-grid gap-2 col-10 mx-auto mb-1">
                                                <button class="add-item btn btn-secondary" id="itemAdd{{ $data->id }}"
                                                    onclick="add_item(<?php echo $data->id; ?>)" type="button" >
                                                    <i class="fa fa-plus ml-1"></i> Add Item </button>
                                           <p style="display:none" id="message1{{ $data->id }}">The max limit is 3 consultation</p>
                                                  </div>
                                            <div class="d-grid gap-2 col-10 mx-auto mb-5">
                                                <button class="btn btn-primary" type="submit">Submit</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>

        </div>
        </div>

        </div>

    </section>

    <!--Sample Products-->
    <section data-bs-spy="scroll" class="gallery min-vh-100 text-center my-2">
        <h1 class="container mx-auto mb-2" id="sample">Sample Products</h1>
        <div class="container-lg">
            <div class="row gy-4 row-cols-1 row-cols-sm-2 row-cols-md-3">
                <div class="col" data-aos="fade-up" data-aos-duration="1000" id="ring">
                    <img src="images/slider/1.jpg" class="gallery-item" alt="gallery">
                </div>
                <div class="col" data-aos="fade-up" data-aos-duration="1000" id="plaque">
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

    <!-- Modal -->
    <div class="modal fade" id="gallery-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    {{-- <h5 class="modal-title" id="ring">3D Printed Ring</h5> --}}
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="images/slider/1.jpg" class="modal-img" alt="modal img">
                </div>
            </div>
        </div>
    </div>

    <!--Achievements-->
    <section data-bs-spy="scroll" class="container my-5">
        <div id="achievements">
            <h1 class="text-center py-5">Achievements</h1>
        </div>
        <div class="text-center">
            <img class="w-50 shadow-lg gallery-item" data-aos="fade-up" data-aos-duration="1000"
                src="images/certificates/certificate.jpg" alt="CERTIFICATE">
        </div>
        <div class="py-5 " data-aos="fade-up" data-aos-duration="1000">
            <p>ISAT U – DTI FabLab grabbed first place and was consequently declared as the people’s choice awardee in the
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



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    {{-- services --}}
    <script>
        var index1 = 1;

        function add_item_services(id) {
            var row = jQuery("#row-of-form" + id).clone();
            jQuery(".item_name", row).attr("id", "item_name" + id + index1).val("");
            jQuery(".description", row).attr("id", "description" + id + index1);
            jQuery(".material", row).attr("id", "material" + id + index1);
            jQuery(".quantity", row).attr("id", "quantity" + id + index1).val("");
            jQuery(".start_date", row).attr("id", "start_date" + id + index1).val("");
            jQuery(".end_date", row).attr("id", "end_date" + id + index1).val("");
            jQuery(".remove", row)
                .attr("id", "remove" + id + index1)
                .show();
            if(index1<=2){
              jQuery("#row-cloned" + id).append(row);
              index1++;
            }
            $("body").on("click", ".remove", function() {
                $(this).closest("#row-of-form" + id).remove();
            });
        }
    </script>

    {{-- training --}}
    <script>
        var index = 1;

        function add_item(id) {
            var row = jQuery("#training-form" + id).clone();
            jQuery(".training_item", row).attr("id", "training_item" + id + index).val("");
            jQuery(".training_description", row).attr("id", "training_description" + id + index);
            jQuery(".training_material", row).attr("id", "training_material" + id + index);
            jQuery(".training_quantity", row).attr("id", "training_quantity" + id + index).val("");
            jQuery(".training_start", row).attr("id", "training_start" + id + index).val("");
            jQuery(".training_end", row).attr("id", "training_end" + id + index).val("");
            jQuery(".remove", row)
                .attr("id", "remove" + id + index)
                .show();
            if (index <= 3) {
                jQuery("#training-cloned" + id).append(row);
                index++;  
                if(index==3){
              $('#message1'+id).show();
              $("#itemAdd"+id).prop("disabled", true);

                }
            }
                  $("#itemAdd").css("display","none");
            $("body").on("click", ".remove", function() {
                $(this).closest("#training-form" + id).remove();
            });
        }
    </script>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

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
