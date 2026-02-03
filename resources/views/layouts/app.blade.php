<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Fondo animado de partículas -->
    <style>
        body {
            background: #f3f4f6;
            overflow-x: hidden;
        }

        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .particle {
            position: absolute;
            width: 6px;
            height: 6px;
            background: rgba(0, 0, 0, 0.08);
            border-radius: 50%;
            animation: float 12s infinite ease-in-out;
        }

        @keyframes float {
            0% {
                transform: translateY(0) translateX(0);
                opacity: 0.4;
            }

            50% {
                transform: translateY(-40px) translateX(20px);
                opacity: 0.7;
            }

            100% {
                transform: translateY(0) translateX(0);
                opacity: 0.4;
            }
        }
    </style>
</head>

<body class="font-sans antialiased">

    <!-- Contenedor de partículas -->
    <div class="particles">
        @for ($i = 0; $i < 40; $i++)
            <div class="particle"
                style="
                top: {{ rand(0, 100) }}%;
                left: {{ rand(0, 100) }}%;
                animation-delay: {{ rand(0, 10) }}s;
                animation-duration: {{ rand(8, 18) }}s;
            ">
            </div>
        @endfor
    </div>

    <div class="min-h-screen">
        @include('layouts.navigation')

        <main>
            {{ $slot }}
        </main>
    </div>
    <canvas id="network-bg"></canvas>

    <style>
        #network-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: #f3f4f6;
            /* gris claro */
        }
    </style>

    <script>
        const canvas = document.getElementById("network-bg");
        const ctx = canvas.getContext("2d");

        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        // Colores inspirados en Tailwind + dorado
        const colors = [
            "#4f46e5", // indigo-600
            "#6366f1", // indigo-500
            "#10b981", // emerald-500
            "#22c55e", // green-500
            "#0ea5e9", // sky-500
            "#ec4899", // pink-500
            "#f59e0b", // amber-500 (dorado)
            "#eab308" // yellow-500 (dorado intenso)
        ];

        const particles = [];
        const particleCount = 90;
        const mouse = {
            x: null,
            y: null,
            radius: 150
        };

        window.addEventListener("mousemove", (e) => {
            mouse.x = e.x;
            mouse.y = e.y;
        });

        class Particle {
            constructor() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * canvas.height;
                this.vx = (Math.random() - 0.5) * 1.2;
                this.vy = (Math.random() - 0.5) * 1.2;
                this.size = 2.4;
                this.color = colors[Math.floor(Math.random() * colors.length)];
            }

            move() {
                this.x += this.vx;
                this.y += this.vy;

                if (this.x < 0 || this.x > canvas.width) this.vx *= -1;
                if (this.y < 0 || this.y > canvas.height) this.vy *= -1;

                // Reacción al ratón
                const dx = this.x - mouse.x;
                const dy = this.y - mouse.y;
                const distance = Math.sqrt(dx * dx + dy * dy);

                if (distance < mouse.radius) {
                    this.x += dx / 10;
                    this.y += dy / 10;
                }
            }

            draw() {
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fillStyle = this.color;
                ctx.fill();
            }
        }

        function connectParticles() {
            for (let i = 0; i < particles.length; i++) {
                for (let j = i + 1; j < particles.length; j++) {
                    const dx = particles[i].x - particles[j].x;
                    const dy = particles[i].y - particles[j].y;
                    const distance = Math.sqrt(dx * dx + dy * dy);

                    if (distance < 160) {
                        ctx.strokeStyle = particles[i].color + "33"; // transparencia
                        ctx.lineWidth = 1;
                        ctx.beginPath();
                        ctx.moveTo(particles[i].x, particles[i].y);
                        ctx.lineTo(particles[j].x, particles[j].y);
                        ctx.stroke();
                    }
                }
            }
        }

        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            particles.forEach(p => {
                p.move();
                p.draw();
            });

            connectParticles();
            requestAnimationFrame(animate);
        }

        for (let i = 0; i < particleCount; i++) {
            particles.push(new Particle());
        }

        animate();

        window.addEventListener("resize", () => {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        });
    </script>

</body>

</html>
