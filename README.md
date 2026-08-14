<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Happy Birthday, My Love ❤️</title>
    <!-- Google Font for a beautiful style -->
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Playfair+Display:ital,wght@0,400;1,700&family=Caveat:wght@600&display=swap" rel="stylesheet">
    <style>
        /* --- Reset & Body Setup --- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            margin: 0;
            overflow: hidden;
            background-color: #0a0a1a;
            font-family: 'Playfair Display', serif;
            cursor: default;
            height: 100vh;
            width: 100vw;
        }

        /* --- Main Title Overlay --- */
        #title {
            position: absolute;
            top: 5%;
            left: 0;
            width: 100%;
            text-align: center;
            color: #fff9e6;
            text-shadow: 0 0 20px rgba(255, 105, 180, 0.8), 0 0 40px rgba(255, 105, 180, 0.4);
            z-index: 10;
            pointer-events: none;
            animation: fadeIn 3s ease-in-out;
            padding: 0 15px;
        }
        #title h1 {
            font-family: 'Dancing Script', cursive;
            font-size: clamp(2.5rem, 12vw, 5rem);
            margin: 0;
            letter-spacing: 2px;
        }
        #title p {
            font-size: clamp(1rem, 4vw, 1.8rem);
            margin: 10px 0 0;
            opacity: 0.9;
            font-style: italic;
        }

        /* --- Confetti Button --- */
        #celebrate-btn {
            position: absolute;
            bottom: 8%;
            left: 50%;
            transform: translateX(-50%);
            padding: 15px 40px;
            font-size: clamp(1.2rem, 4vw, 1.8rem);
            font-family: 'Dancing Script', cursive;
            background: linear-gradient(145deg, #ff8a9e, #ff3b6f);
            color: white;
            border: none;
            border-radius: 50px;
            box-shadow: 0 0 30px rgba(255, 59, 111, 0.6);
            cursor: pointer;
            z-index: 20;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            letter-spacing: 2px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        #celebrate-btn:hover {
            transform: translateX(-50%) scale(1.05);
            box-shadow: 0 0 50px rgba(255, 59, 111, 0.9);
        }
        #celebrate-btn:active {
            transform: translateX(-50%) scale(0.95);
        }

        /* --- Wish Card Overlay (Hidden by default) --- */
        #wish-card-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(10, 10, 26, 0.85);
            backdrop-filter: blur(8px);
            z-index: 100;
            display: none;
            justify-content: center;
            align-items: center;
            animation: fadeIn 0.5s ease;
            padding: 20px;
        }
        #wish-card-overlay.active {
            display: flex;
        }

        .wish-card {
            background: #fdf6e3;
            background-image:
                linear-gradient(rgba(200, 180, 150, 0.1) 1px, transparent 1px),
                linear-gradient(90deg, rgba(200, 180, 150, 0.1) 1px, transparent 1px);
            background-size: 30px 30px;
            padding: 50px 45px;
            max-width: 600px;
            width: 100%;
            border-radius: 8px;
            box-shadow:
                0 20px 60px rgba(0, 0, 0, 0.8),
                0 0 0 1px #d4c5a0,
                inset 0 0 30px rgba(180, 150, 100, 0.2);
            position: relative;
            transform: rotate(-1deg);
            transition: transform 0.3s ease;
            max-height: 85vh;
            overflow-y: auto;
            border: 12px solid #e8d5b5;
            border-image: repeating-linear-gradient(45deg, #d4c5a0, #e8d5b5 10px, #f0e0c0 10px, #d4c5a0 20px) 30;
        }
        .wish-card:hover {
            transform: rotate(0deg) scale(1.01);
        }

        /* Paper texture overlay */
        .wish-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(ellipse at 20% 30%, rgba(255, 215, 150, 0.1) 0%, transparent 60%),
                radial-gradient(ellipse at 80% 70%, rgba(200, 170, 120, 0.1) 0%, transparent 50%);
            pointer-events: none;
            border-radius: 6px;
        }

        .wish-card-content {
            position: relative;
            z-index: 1;
        }

        .wish-card-header {
            text-align: center;
            font-family: 'Dancing Script', cursive;
            font-size: 2.5rem;
            color: #8b3a3a;
            margin-bottom: 10px;
            text-shadow: 1px 1px 0 rgba(255, 200, 150, 0.3);
            border-bottom: 2px dashed #d4c5a0;
            padding-bottom: 15px;
        }

        .wish-card-body {
            font-family: 'Caveat', 'Playfair Display', cursive;
            font-size: 1.6rem;
            line-height: 2.2rem;
            color: #3d2b1f;
            padding: 20px 10px;
            text-align: justify;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .wish-card-body p {
            margin-bottom: 15px;
            text-indent: 30px;
        }

        .wish-card-body .signature {
            text-align: right;
            font-family: 'Dancing Script', cursive;
            font-size: 2rem;
            color: #8b3a3a;
            margin-top: 20px;
            text-indent: 0;
            border-top: 1px solid #d4c5a0;
            padding-top: 15px;
        }

        .wish-card-footer {
            text-align: center;
            margin-top: 20px;
        }

        .close-card-btn {
            background: linear-gradient(145deg, #8b3a3a, #5a1a1a);
            color: #fdf6e3;
            border: none;
            padding: 12px 35px;
            font-size: 1.2rem;
            font-family: 'Dancing Script', cursive;
            border-radius: 40px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(139, 58, 58, 0.4);
            letter-spacing: 1px;
        }
        .close-card-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 25px rgba(139, 58, 58, 0.6);
        }

        /* Decorative elements */
        .wish-card .deco-left {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 2.5rem;
            opacity: 0.3;
            transform: rotate(-15deg);
        }
        .wish-card .deco-right {
            position: absolute;
            bottom: 20px;
            right: 20px;
            font-size: 2.5rem;
            opacity: 0.3;
            transform: rotate(15deg);
        }

        /* Scrollbar styling for the card */
        .wish-card::-webkit-scrollbar {
            width: 6px;
        }
        .wish-card::-webkit-scrollbar-track {
            background: #e8d5b5;
            border-radius: 10px;
        }
        .wish-card::-webkit-scrollbar-thumb {
            background: #8b3a3a;
            border-radius: 10px;
        }

        /* --- Animations --- */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* --- Responsive adjustments --- */
        @media (max-width: 600px) {
            .wish-card {
                padding: 30px 20px;
                margin: 10px;
            }
            .wish-card-header {
                font-size: 2rem;
            }
            .wish-card-body {
                font-size: 1.3rem;
                line-height: 1.8rem;
                padding: 15px 5px;
            }
            .wish-card-body .signature {
                font-size: 1.6rem;
            }
        }
    </style>
</head>
<body>

    <!-- 1. Main Title Overlay -->
    <div id="title">
        <h1>🎂 Happy Birthday, [Your Partner's Name]!</h1>
        <p>You are my everything. My world shines brighter with you. ✨</p>
    </div>

    <!-- 2. Celebrate Button -->
    <button id="celebrate-btn">🎉 Make a Wish!</button>

    <!-- 3. Wish Card Overlay -->
    <div id="wish-card-overlay">
        <div class="wish-card">
            <span class="deco-left">🌸</span>
            <span class="deco-right">🌹</span>
            <div class="wish-card-content">
                <div class="wish-card-header">
                    💌 My Dearest Love
                </div>
                <div class="wish-card-body">
                    <p>
                        On this special day, I just want to remind you how incredibly amazing you are.
                        You light up my world in ways you'll never fully understand.
                    </p>
                    <p>
                        Every moment with you is a treasure, every laugh shared is a melody,
                        and every day I spend with you is a gift I'm eternally grateful for.
                    </p>
                    <p>
                        Today, we celebrate you — the most beautiful soul I've ever known.
                        May your year ahead be filled with as much joy and wonder as you bring
                        into my life every single day.
                    </p>
                    <p>
                        I love you more than words can say, more than stars in the sky,
                        and more than all the birthdays to come.
                    </p>
                    <div class="signature">
                        Forever yours, <br>
                        ❤️ [Your Name]
                    </div>
                </div>
                <div class="wish-card-footer">
                    <button class="close-card-btn" id="close-card-btn">✨ Back to the Magic ✨</button>
                </div>
            </div>
        </div>
    </div>

    <!-- 4. Container for 3D Scene -->
    <div id="three-container"></div>

    <!-- 5. Load Three.js library and the main script -->
    <script type="importmap">
        {
            "imports": {
                "three": "https://unpkg.com/three@0.128.0/build/three.module.js"
            }
        }
    </script>

    <script type="module">
        import * as THREE from 'three';

        // --- 1. Setup Scene, Camera, Renderer ---
        const container = document.getElementById('three-container');
        const scene = new THREE.Scene();
        scene.background = new THREE.Color(0x0a0a1a);
        scene.fog = new THREE.FogExp2(0x0a0a1a, 0.002);

        const camera = new THREE.PerspectiveCamera(45, window.innerWidth / window.innerHeight, 0.1, 1000);
        camera.position.set(0, 2, 12);
        camera.lookAt(0, 0, 0);

        const renderer = new THREE.WebGLRenderer({ antialias: true });
        renderer.setSize(window.innerWidth, window.innerHeight);
        renderer.shadowMap.enabled = false;
        renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
        container.appendChild(renderer.domElement);

        // --- 2. Add Lights ---
        const ambientLight = new THREE.AmbientLight(0x404060);
        scene.add(ambientLight);

        const light1 = new THREE.PointLight(0xff6b8a, 1.5, 30);
        light1.position.set(5, 5, 5);
        scene.add(light1);

        const light2 = new THREE.PointLight(0x4a8cff, 1, 30);
        light2.position.set(-5, 3, 5);
        scene.add(light2);

        const light3 = new THREE.PointLight(0xffaa66, 0.8, 20);
        light3.position.set(0, -2, -8);
        scene.add(light3);

        // --- 3. Create the Heart ---
        function createHeart() {
            const heartGroup = new THREE.Group();
            const geometry = new THREE.SphereGeometry(1, 64, 64);
            const positionAttribute = geometry.attributes.position;
            const vertex = new THREE.Vector3();

            for (let i = 0; i < positionAttribute.count; i++) {
                vertex.x = positionAttribute.getX(i);
                vertex.y = positionAttribute.getY(i);
                vertex.z = positionAttribute.getZ(i);

                const x = vertex.x;
                const y = vertex.y;
                const z = vertex.z;

                const scaleX = 1.0 + 0.6 * Math.sqrt(Math.max(0, 1 - Math.abs(y))) * (1 - Math.abs(y));
                const scaleZ = 1.0 + 0.4 * (1 - Math.abs(y)) * (1 - Math.abs(y));

                vertex.x = x * scaleX * 1.2;
                vertex.y = y * 1.1;
                vertex.z = z * scaleZ * 1.2;

                if (vertex.y > 0.2) {
                    const cleftFactor = Math.max(0, (vertex.y - 0.2) / 0.8);
                    const cleft = 0.25 * cleftFactor * cleftFactor;
                    vertex.x -= Math.sign(vertex.x) * cleft * 0.8;
                    vertex.z -= Math.sign(vertex.z) * cleft * 0.8;
                }

                vertex.x *= 1.2;
                vertex.y *= 0.9;
                vertex.z *= 1.1;

                positionAttribute.setXYZ(i, vertex.x, vertex.y, vertex.z);
            }

            geometry.computeVertexNormals();

            const material = new THREE.MeshPhongMaterial({
                color: 0xff3b6f,
                emissive: 0x550022,
                shininess: 60,
                specular: 0xffaa99,
                flatShading: false,
                transparent: true,
                opacity: 0.92,
                side: THREE.DoubleSide,
            });

            const heartMesh = new THREE.Mesh(geometry, material);
            heartGroup.add(heartMesh);

            const wireframeMaterial = new THREE.MeshBasicMaterial({
                color: 0xff6b8a,
                wireframe: true,
                transparent: true,
                opacity: 0.15,
            });
            const wireframeMesh = new THREE.Mesh(geometry, wireframeMaterial);
            heartGroup.add(wireframeMesh);

            const ringGeometry = new THREE.TorusGeometry(1.5, 0.03, 16, 64);
            const ringMaterial = new THREE.MeshStandardMaterial({
                color: 0xffaa88,
                emissive: 0xff3b6f,
                emissiveIntensity: 0.5,
                transparent: true,
                opacity: 0.6,
            });
            const ring = new THREE.Mesh(ringGeometry, ringMaterial);
            ring.rotation.x = Math.PI / 2;
            ring.rotation.z = Math.PI / 6;
            ring.position.y = -0.1;
            heartGroup.add(ring);

            return heartGroup;
        }

        const heart = createHeart();
        scene.add(heart);
        heart.scale.set(0.8, 0.8, 0.8);

        // --- 4. Create Floating Particles ---
        function createParticles() {
            const particleCount = 800;
            const positions = new Float32Array(particleCount * 3);
            const colors = new Float32Array(particleCount * 3);
            const sizes = new Float32Array(particleCount);

            const colorPalette = [
                new THREE.Color(0xff6b8a),
                new THREE.Color(0xffaa88),
                new THREE.Color(0xffd166),
                new THREE.Color(0x6c9eff),
                new THREE.Color(0xaa88ff),
                new THREE.Color(0xff3b6f),
            ];

            for (let i = 0; i < particleCount; i++) {
                const radius = 3.5 + Math.random() * 4;
                const theta = Math.random() * Math.PI * 2;
                const phi = Math.acos((Math.random() * 2) - 1);

                positions[i*3] = radius * Math.sin(phi) * Math.cos(theta);
                positions[i*3+1] = radius * Math.sin(phi) * Math.sin(theta) * 0.8;
                positions[i*3+2] = radius * Math.cos(phi);

                const col = colorPalette[Math.floor(Math.random() * colorPalette.length)];
                colors[i*3] = col.r;
                colors[i*3+1] = col.g;
                colors[i*3+2] = col.b;

                sizes[i] = 0.05 + Math.random() * 0.15;
            }

            const geometry = new THREE.BufferGeometry();
            geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
            geometry.setAttribute('color', new THREE.BufferAttribute(colors, 3));
            geometry.setAttribute('size', new THREE.BufferAttribute(sizes, 1));

            const material = new THREE.PointsMaterial({
                size: 0.15,
                vertexColors: true,
                transparent: true,
                opacity: 0.8,
                blending: THREE.AdditiveBlending,
                depthWrite: false,
                sizeAttenuation: true,
            });

            return new THREE.Points(geometry, material);
        }

        const particleSystem = createParticles();
        scene.add(particleSystem);

        // --- 5. Create Floating Text Sprites ---
        function createTextSprite(text, color = '#ffaabb', size = 0.4) {
            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext('2d');
            canvas.width = 256;
            canvas.height = 128;

            ctx.clearRect(0, 0, canvas.width, canvas.height);
            ctx.font = 'Bold 40px "Dancing Script", "Playfair Display", cursive';
            ctx.textAlign = 'center';
            ctx.textBaseline = 'middle';

            ctx.shadowColor = 'rgba(255, 105, 180, 0.8)';
            ctx.shadowBlur = 20;
            ctx.fillStyle = color;
            ctx.fillText(text, canvas.width/2, canvas.height/2);

            ctx.shadowBlur = 10;
            ctx.fillStyle = '#ffffff';
            ctx.fillText(text, canvas.width/2, canvas.height/2);

            const texture = new THREE.CanvasTexture(canvas);
            const material = new THREE.SpriteMaterial({
                map: texture,
                transparent: true,
                depthTest: false,
                depthWrite: false,
                blending: THREE.AdditiveBlending,
            });
            const sprite = new THREE.Sprite(material);
            sprite.scale.set(size * 2, size, 1);
            return sprite;
        }

        const loveNotes = [
            { text: '❤️', color: '#ff3b6f', size: 0.8 },
            { text: '✨', color: '#ffd166', size: 0.6 },
            { text: '🌸', color: '#ff8a9e', size: 0.7 },
            { text: '💖', color: '#ff6b8a', size: 0.7 },
            { text: '🌟', color: '#ffaa66', size: 0.6 },
            { text: '💫', color: '#aa88ff', size: 0.6 },
            { text: '🌹', color: '#ff3b6f', size: 0.8 },
            { text: '💝', color: '#ff6b8a', size: 0.7 },
            { text: 'My Love', color: '#ffaabb', size: 0.9 },
            { text: 'You & Me', color: '#ffd166', size: 0.9 },
            { text: 'Forever', color: '#6c9eff', size: 0.9 },
            { text: '❤️', color: '#ff3b6f', size: 0.8 },
            { text: '✨', color: '#ffd166', size: 0.6 },
            { text: '🌸', color: '#ff8a9e', size: 0.7 },
        ];

        const noteSprites = [];
        loveNotes.forEach((note, index) => {
            const sprite = createTextSprite(note.text, note.color, note.size);

            const radius = 2.5 + Math.random() * 3.5;
            const theta = Math.random() * Math.PI * 2;
            const phi = Math.acos((Math.random() * 2) - 1);

            sprite.position.x = radius * Math.sin(phi) * Math.cos(theta);
            sprite.position.y = radius * Math.sin(phi) * Math.sin(theta) * 0.9;
            sprite.position.z = radius * Math.cos(phi);

            sprite.userData = {
                angle: theta,
                phi: phi,
                radius: radius,
                speed: 0.001 + Math.random() * 0.002,
                floatOffset: Math.random() * Math.PI * 2,
            };

            scene.add(sprite);
            noteSprites.push(sprite);
        });

        // --- 6. Add a subtle background glow ---
        function createGlow() {
            const canvas = document.createElement('canvas');
            canvas.width = 512;
            canvas.height = 512;
            const ctx = canvas.getContext('2d');
            const gradient = ctx.createRadialGradient(256, 256, 0, 256, 256, 256);
            gradient.addColorStop(0, 'rgba(255, 59, 111, 0.3)');
            gradient.addColorStop(0.3, 'rgba(255, 107, 138, 0.15)');
            gradient.addColorStop(1, 'rgba(0, 0, 0, 0)');
            ctx.fillStyle = gradient;
            ctx.fillRect(0, 0, 512, 512);

            const texture = new THREE.CanvasTexture(canvas);
            const material = new THREE.SpriteMaterial({
                map: texture,
                blending: THREE.AdditiveBlending,
                depthWrite: false,
            });
            const sprite = new THREE.Sprite(material);
            sprite.scale.set(20, 20, 1);
            sprite.position.set(0, 0, -5);
            return sprite;
        }
        scene.add(createGlow());

        // --- 7. Animation Loop ---
        let clock = new THREE.Clock();

        function animate() {
            const delta = clock.getDelta();
            const elapsedTime = performance.now() / 1000;

            heart.rotation.y += 0.003;
            heart.rotation.x = Math.sin(elapsedTime * 0.1) * 0.1;
            heart.rotation.z = Math.cos(elapsedTime * 0.15) * 0.05;

            particleSystem.rotation.y += 0.0005;
            particleSystem.rotation.x = Math.sin(elapsedTime * 0.02) * 0.05;

            noteSprites.forEach((sprite, index) => {
                const data = sprite.userData;
                data.angle += data.speed * delta * 30;

                const floatY = Math.sin(elapsedTime * 0.8 + data.floatOffset) * 0.15;

                const x = data.radius * Math.sin(data.phi) * Math.cos(data.angle);
                const y = data.radius * Math.sin(data.phi) * Math.sin(data.angle) * 0.9 + floatY;
                const z = data.radius * Math.cos(data.phi);

                sprite.position.set(x, y, z);

                const pulse = 1 + Math.sin(elapsedTime * 1.5 + index) * 0.05;
                sprite.scale.set(
                    sprite.scale.x * (0.99 + 0.01 * pulse),
                    sprite.scale.y * (0.99 + 0.01 * pulse),
                    1
                );
            });

            camera.position.x = Math.sin(elapsedTime * 0.05) * 1.2;
            camera.position.y = 2 + Math.sin(elapsedTime * 0.1) * 0.3;
            camera.lookAt(0, 0, 0);

            renderer.render(scene, camera);
            requestAnimationFrame(animate);
        }

        animate();

        // --- 8. Handle Window Resize ---
        window.addEventListener('resize', onWindowResize, false);
        function onWindowResize() {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        }

        // --- 9. Button Logic: Show Wish Card & Confetti ---
        const celebrateBtn = document.getElementById('celebrate-btn');
        const wishCardOverlay = document.getElementById('wish-card-overlay');
        const closeCardBtn = document.getElementById('close-card-btn');

        function showWishCard() {
            // Show the wish card
            wishCardOverlay.classList.add('active');

            // Fire confetti
            import('https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js')
                .then(module => {
                    const confetti = module.default;
                    confetti({
                        particleCount: 150,
                        spread: 70,
                        origin: { y: 0.6 },
                        colors: ['#ff3b6f', '#ffd166', '#6c9eff', '#aa88ff', '#ff8a9e']
                    });
                    confetti({
                        particleCount: 100,
                        spread: 100,
                        origin: { y: 0.5, x: 0.3 },
                        colors: ['#ffaa88', '#ff3b6f', '#ffd166']
                    });
                    confetti({
                        particleCount: 100,
                        spread: 100,
                        origin: { y: 0.5, x: 0.7 },
                        colors: ['#6c9eff', '#aa88ff', '#ff8a9e']
                    });
                    setTimeout(() => {
                        confetti({
                            particleCount: 200,
                            spread: 120,
                            origin: { y: 0.4 },
                            colors: ['#ff3b6f', '#ffd166', '#6c9eff', '#aa88ff', '#ff8a9e', '#ffffff']
                        });
                    }, 200);
                })
                .catch(err => console.log('Confetti library failed to load, but the heart is still there!'));

            // Change button text
            celebrateBtn.textContent = '🎉 Wishes Coming True! ✨';
            celebrateBtn.style.background = 'linear-gradient(145deg, #ffd166, #ff3b6f)';
            setTimeout(() => {
                celebrateBtn.textContent = '🎉 Make Another Wish!';
                celebrateBtn.style.background = 'linear-gradient(145deg, #ff8a9e, #ff3b6f)';
            }, 3000);
        }

        function hideWishCard() {
            wishCardOverlay.classList.remove('active');
        }

        celebrateBtn.addEventListener('click', showWishCard);
        closeCardBtn.addEventListener('click', hideWishCard);

        // Close card when clicking outside of it
        wishCardOverlay.addEventListener('click', function(e) {
            if (e.target === this) {
                hideWishCard();
            }
        });

        // Close card with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && wishCardOverlay.classList.contains('active')) {
                hideWishCard();
            }
        });

        console.log('❤️ Happy Birthday! Made with love. ❤️');
    </script>
</body>
</html>
