@push('sheets')
    <link rel="stylesheet" href="{{ asset('css/carousel.css') }}">
@endpush

<h3>Categories</h3>
<div id="carousel-area" data-carousel-pos="{{ $pos }}">
    <div class ="btn-container">
        <div id="left-btn" class="btn"><i class="fa-solid fa-arrow-left"></i></div>
    </div>

    <div id="carousel-container">
        <div id="carousel-track">
            <div class="carousel-items no-select" data-href="{{ route('index') . '?category=All'}}">
                All
            </div>
            
            @foreach ($categories as $category)
                <div class="carousel-items no-select" data-href="{{ route('index') . '?category=' . $category->name }}">
                    {{ $category->name }}
                </div>
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
        let carouselPos = parseInt(carousel.getAttribute('data-carousel-pos'));

        carouselTrack.style.transitionProperty = 'none';
        carouselTrack.style.transform = `translateX(-${offsetX * carouselPos}px)`

        carouselTrack.offsetHeight;

        carouselTrack.style.transitionProperty = 'transform'

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

        Array.from(carouselItems).forEach(button => {
            button.addEventListener('click', function (){
                window.location.href = button.getAttribute('data-href') + `&carousel-pos=${carouselPos}`;
            });
        })
    </script>
@endpush




