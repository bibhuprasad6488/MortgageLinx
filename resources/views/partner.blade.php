    <div class="container-fluid partner">
        <style>
            .partner-carousel {
                overflow: hidden;
                width: 100%;
                background: #f5f0f4;
                /* padding: 20px 0; */
            }

            .carousel-track {
                display: flex;
                width: max-content;
                animation: scroll 30s linear infinite;
            }

            .logo {
                flex: 0 0 auto;
                width: 150px;
                margin: 0 6px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .logo img {
                max-width: 100%;
                filter: grayscale(100%);
                transition: 0.3s;
            }

            .logo img:hover {
                filter: grayscale(0%);
                transform: scale(1.1);
            }

            /* Animation */
            @keyframes scroll {
                from {
                    transform: translateX(0);
                }

                to {
                    transform: translateX(-50%);
                }
            }

            /* Pause on hover */
            .partner-carousel:hover .carousel-track {
                animation-play-state: paused;
            }

            /* Responsive */
            @media (max-width: 768px) {
                .logo {
                    width: 100px;
                    margin: 0 10px;
                }
            }
        </style>
        <div class="partner-carousel">
            <div class="carousel-track">
                <!-- Original logos -->
                @foreach ($partners as $p)
                    <div class="logo"><img src="{{ $p->partner_image }}" /></div>
                @endforeach
                <!-- Duplicate for seamless loop -->
                @foreach ($partners as $p)
                    <div class="logo"><img src="{{ $p->partner_image }}" /></div>
                @endforeach
            </div>
        </div>
    </div>
