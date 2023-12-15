   <header>
      <div class="header-container">
         <nav class="header-nav-bar">
				<div class="header-nav-logo">
					<a href="index.html">
						<img src="https://res.cloudinary.com/joshuafolorunsho/image/upload/v1591615159/star_hotels_logo.png"
							alt="star hotels logo">
					</a>
				</div>
				<ul class="header-nav-lists">
						<li class="header-nav-list">
							<a class="header-nav-link header-active" href="index.html">Home</a>
						</li>
						<li class="header-nav-list"><a class="header-nav-link"
								href="rooms-and-suites.html">Rooms and Suites</a></li>
						<li class="header-nav-list"><a class="header-nav-link" href="facilities.html">Facilities</a></li>
						<li class="header-nav-list"><a class="header-nav-link" href="contact-page.html">Contact Us</a></li>


                    @if(Route::has('login'))

                    @auth
                    <x-app-layout>
                    </x-app-layout>

                    @else

						<li class="header-nav-list"><a class="header-btn header-btn-custom" href="{{route('login')}}">Login</a></li>
						<li class="header-nav-list"><a class="header-btn header-btn-custom" href="{{route('register')}}">Register</a></li>
                    
                    @endauth
                    @endif					

</ul>

            
            <div class="header-hamburger-icon">
               <div class="header-hamburger-line-1"></div>
               <div class="header-hamburger-line-2"></div>
               <div class="header-hamburger-line-3"></div>
            </div>
         </nav>
      </div>

      </div>
	</header>
