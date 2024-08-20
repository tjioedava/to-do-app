@push('sheets')
    <link rel="stylesheet" href="{{ asset('css/carousel.css') }}">
@endpush

<h3>Categories (Current: {{ $selectedCategory }})</h3>

<!--containing information about last carousel position / index-->
<div id="carousel-area" data-carousel-pos="{{ $pos }}">
    <div class ="btn-container">
        <div id="left-btn" class="btn"><i class="fa-solid fa-arrow-left"></i></div>
    </div>

    <div id="carousel-container">
        <div id="carousel-track">

            <!--each item holds data href for on-click listener binding purpose on the script-->
            <div class="carousel-items no-select" data-href="{{ route('index') . '?category=All'}}"
            {{ $selectedCategory == 'All' ? 'id=selected' : '' }}> <!--concating queries-->
                All
            </div>

            <!--creating carousel item for each category-->
            @foreach ($categories as $category)
                <div class="carousel-items no-select" data-href="{{ route('index') . '?category=' . $category->name }}"
                    {{ $category->name == $selectedCategory ? 'id=selected' : '' }}>
                    {{ $category->name }}
                </div>
                <!--apply selected id to the matching item (parameterized from the component caller)-->
            @endforeach
        </div>
    </div>

    <div class="btn-container">
        <div id="right-btn" class="btn"><i class="fa-solid fa-arrow-right"></i></div>
    </div>
</div>

@push('scripts')
    <script>
        const carousel = document.getElementById('carousel-area');
        const carouselTrack = document.getElementById('carousel-track');
        const leftBtn = document.getElementById('left-btn');
        const rightBtn = document.getElementById('right-btn');

        const carouselItems = document.getElementsByClassName('carousel-items');
        const carouselItem = carouselItems[0];
        const carouselLength = carouselItems.length;
        const carouselItemStyle = window.getComputedStyle(carouselItem);
        const offsetX = parseInt(carouselItemStyle.width) + parseInt(carouselItemStyle.marginRight);

        //retreiving carousel last position / index
        let carouselPos = parseInt(carousel.getAttribute('data-carousel-pos'));

        /*temporarily disabling transition animation & initially transforming the
        carousel to the last position*/
        carouselTrack.style.transitionProperty = 'none';
        carouselTrack.style.transform = `translateX(-${offsetX * carouselPos}px)`

        //force to apply the transformation before reactivating the transition
        carouselTrack.offsetHeight;

        carouselTrack.style.transitionProperty = 'transform'

        //bind the buttons to slide the carousel track

        leftBtn.addEventListener('click', function (){
            if(carouselPos > 0){
                carouselTrack.style.transform = `translateX(-${offsetX * --carouselPos}px)`;
            }
        });

        rightBtn.addEventListener('click', function (){
            if(carouselPos < carouselLength - 3){
                carouselTrack.style.transform = `translateX(-${parseInt(offsetX, 10) * ++carouselPos}px)`;
            }   
        });

        //bind each carousel item to access link in its data-href attribute when clicked
        Array.from(carouselItems).forEach(button => {
            button.addEventListener('click', function (){
                window.location.href = button.getAttribute('data-href') + `&carousel-pos=${carouselPos}`; //querying the last carousel pos
            });
        })
    </script>
@endpush




