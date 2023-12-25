 <!-- Rooms -->
         

  <section class="rooms-section">
                <div class="row room-section-header-container">
                </div>
                <div class="row center-lg">


                @foreach($room as $rooms)
                    <div class="rooms col col-2">
                        <img height="200px" width="400px" src="roomimage/{{$rooms->image}}"
                            alt="" class="rooms-img">
                        <h3 class="room-title">Room nr{{$rooms->roomNumber}}</h3>
                        <p class="room-text">{{$rooms->description}}</p>
                        <div>
                            <div class="details-container">
                                <img src="assets/img/check-square.svg" alt="tick" class="list-icon">
                                <p class="list-text">{{$rooms->persons}} Persons</p>
                            </div>
                            <div class="details-container">
                                <img src="assets/img/check-square.svg" alt="tick" class="list-icon">
                                <p class="list-text">{{$rooms->classRoom}}</p>
                            </div>
                        </div>
                        <p class="amount-text">{{$rooms->price}}€ Per Night</p>
                        <div class="buttons-container">
                            <a href="#" class="btn btn-ghost">View More</a>
                            <a href="" class="btn btn-fill">Book Now</a>
                        </div>
                    </div>
                @endforeach

                   
                   
                </div>
            </section>