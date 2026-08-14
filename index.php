<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Happy Birthday, My Love ❤️</title>
    <!-- Google Font for a beautiful style -->
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Playfair+Display:ital,wght@0,400;1,700&display=swap" rel="stylesheet">
    <style>
        /* --- Reset & Body Setup --- */
        body {
            margin: 0;
            overflow: hidden; /* Hide scrollbars for a clean look */
            background-color: #0a0a1a; /* Deep night sky */
            font-family: 'Playfair Display', serif;
            cursor: default;
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
            pointer-events: none; /* Allow clicks to pass through */
            animation: fadeIn 3s ease-in-out;
            padding: 0 15px;
            box-sizing: border-box;
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

        /* --- Simple Animation for Title --- */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* --- Optional: A subtle loading message (will be replaced) --- */
        #loading {
            position: absolute;
            bottom: 20%;
            left: 50%;
            transform: translateX(-50%);
            color: #aaa;
            z-index: 0;
            font-family: 'Playfair Display', serif;
            font-size: 1rem;
            opacity: 0.6;
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

    <!-- 3. Container for 3D Scene -->
    <div id="three-container"></div>

    <!-- 4. Load Three.js library and the main script -->
    <script type="importmap">
        {
            "imports": {
                "three": "https://unpkg.com/three@0.128.0/build/three.module.js"
            }
        }
    </script>

    <script type="module">
        import * as THREE from 'three';
        import { OrbitControls } from 'https://unpkg.com/three@0.128.0/examples/jsm/controls/OrbitControls.js';

        // --- 1. Setup Scene, Camera, Renderer ---
        const container = document.getElementById('three-container');
        const scene = new THREE.Scene();
        scene.background = new THREE.Color(0x0a0a1a); // Dark blue-black

        // Add a subtle fog for depth
        scene.fog = new THREE.FogExp2(0x0a0a1a, 0.002);

        const camera = new THREE.PerspectiveCamera(45, window.innerWidth / window.innerHeight, 0.1, 1000);
        camera.position.set(0, 2, 12);
        camera.lookAt(0, 0, 0);

        const renderer = new THREE.WebGLRenderer({ antialias: true });
        renderer.setSize(window.innerWidth, window.innerHeight);
        renderer.shadowMap.enabled = false; // Not needed for this scene
        renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2)); // Performance-friendly
        container.appendChild(renderer.domElement);

        // --- 2. Add Lights ---
        // Ambient light for base illumination
        const ambientLight = new THREE.AmbientLight(0x404060);
        scene.add(ambientLight);

        // Main warm light from the right
        const light1 = new THREE.PointLight(0xff6b8a, 1.5, 30);
        light1.position.set(5, 5, 5);
        scene.add(light1);

        // Cool light from the left for contrast
        const light2 = new THREE.PointLight(0x4a8cff, 1, 30);
        light2.position.set(-5, 3, 5);
        scene.add(light2);

        // Back light to create rim highlights
        const light3 = new THREE.PointLight(0xffaa66, 0.8, 20);
        light3.position.set(0, -2, -8);
        scene.add(light3);

        // --- 3. Create the Heart (using a mathematical shape) ---
        function createHeart() {
            const heartGroup = new THREE.Group();

            // Use a SphereGeometry and modify vertices to form a heart
            // This is a common technique for a smooth heart shape
            const geometry = new THREE.SphereGeometry(1, 64, 64);
            const positionAttribute = geometry.attributes.position;
            const vertex = new THREE.Vector3();

            for (let i = 0; i < positionAttribute.count; i++) {
                vertex.x = positionAttribute.getX(i);
                vertex.y = positionAttribute.getY(i);
                vertex.z = positionAttribute.getZ(i);

                // Scale and distort to heart shape
                // Formulas based on a popular 3D heart parametric equation
                const x = vertex.x;
                const y = vertex.y;
                const z = vertex.z;

                // Heart parameters: scale X and Z based on Y
                // The classic heart shape formula: (x^2 + (9/4)y^2 + z^2 - 1)^3 - x^2 * z^3 - (9/80)y^2 * z^3 <= 0
                // We'll adapt it to distort a sphere
                const scaleX = 1.0 + 0.6 * Math.sqrt(Math.max(0, 1 - Math.abs(y))) * (1 - Math.abs(y));
                const scaleZ = 1.0 + 0.4 * (1 - Math.abs(y)) * (1 - Math.abs(y));

                // Apply scaling
                vertex.x = x * scaleX * 1.2; // Stretch horizontally
                vertex.y = y * 1.1; // Slightly taller
                vertex.z = z * scaleZ * 1.2; // Stretch depth

                // Additional shaping for the top cleft
                if (vertex.y > 0.2) {
                    const cleftFactor = Math.max(0, (vertex.y - 0.2) / 0.8);
                    const cleft = 0.25 * cleftFactor * cleftFactor;
                    vertex.x -= Math.sign(vertex.x) * cleft * 0.8;
                    vertex.z -= Math.sign(vertex.z) * cleft * 0.8;
                }

                // Final tweaks for a more pleasing shape
                vertex.x *= 1.2;
                vertex.y *= 0.9;
                vertex.z *= 1.1;

                positionAttribute.setXYZ(i, vertex.x, vertex.y, vertex.z);
            }

            geometry.computeVertexNormals();

            // --- Heart Material (Shiny, glossy red with emission) ---
            const material = new THREE.MeshPhongMaterial({
                color: 0xff3b6f,
                emissive: 0x550022,
                shininess: 60,
                specular: 0xffaa99,
                flatShading: false,
                transparent: true,
                opacity: 0.92,
                side: THREE.DoubleSide, // Show inside for a glass-like effect
            });

            const heartMesh = new THREE.Mesh(geometry, material);
            heartGroup.add(heartMesh);

            // Add a wireframe overlay for a modern techy look (optional)
            const wireframeMaterial = new THREE.MeshBasicMaterial({
                color: 0xff6b8a,
                wireframe: true,
                transparent: true,
                opacity: 0.15,
            });
            const wireframeMesh = new THREE.Mesh(geometry, wireframeMaterial);
            heartGroup.add(wireframeMesh);

            // Add a glowing ring around the heart
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

        // Scale the whole heart group to a nice size
        heart.scale.set(0.8, 0.8, 0.8);

        // --- 4. Create Floating Particles (Stars & Love Notes) ---
        function createParticles() {
            const particleCount = 800;
            const positions = new Float32Array(particleCount * 3);
            const colors = new Float32Array(particleCount * 3);
            const sizes = new Float32Array(particleCount);
            
            // We'll make some particles heart-shaped emojis? No, we'll use simple spheres with colors.
            // But for a more advanced effect, let's create a mix of small stars and larger "love notes" (text sprites)
            // For simplicity and better performance, we'll use a Points system with colors.
            // Then we'll add separate floating text sprites.

            const colorPalette = [
                new THREE.Color(0xff6b8a), // Pink
                new THREE.Color(0xffaa88), // Peach
                new THREE.Color(0xffd166), // Gold
                new THREE.Color(0x6c9eff), // Light Blue
                new THREE.Color(0xaa88ff), // Lavender
                new THREE.Color(0xff3b6f), // Hot Pink
            ];

            for (let i = 0; i < particleCount; i++) {
                // Position in a sphere of radius 6
                const radius = 3.5 + Math.random() * 4;
                const theta = Math.random() * Math.PI * 2;
                const phi = Math.acos((Math.random() * 2) - 1);

                positions[i*3] = radius * Math.sin(phi) * Math.cos(theta);
                positions[i*3+1] = radius * Math.sin(phi) * Math.sin(theta) * 0.8; // Flatten vertically a bit
                positions[i*3+2] = radius * Math.cos(phi);

                // Color
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

            const particles = new THREE.Points(geometry, material);
            return particles;
        }

        const particleSystem = createParticles();
        scene.add(particleSystem);

        // --- 5. Create Floating Text Sprites (Love Notes) ---
        function createTextSprite(text, color = '#ffaabb', size = 0.4) {
            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext('2d');
            canvas.width = 256;
            canvas.height = 128;

            // Background transparent
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            // Text style
            ctx.font = 'Bold 40px "Dancing Script", "Playfair Display", cursive';
            ctx.textAlign = 'center';
            ctx.textBaseline = 'middle';
            
            // Glow effect
            ctx.shadowColor = 'rgba(255, 105, 180, 0.8)';
            ctx.shadowBlur = 20;
            ctx.fillStyle = color;
            ctx.fillText(text, canvas.width/2, canvas.height/2);

            // Second pass for sharper text
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
            
            // Position randomly in a sphere around the heart
            const radius = 2.5 + Math.random() * 3.5;
            const theta = Math.random() * Math.PI * 2;
            const phi = Math.acos((Math.random() * 2) - 1);
            
            sprite.position.x = radius * Math.sin(phi) * Math.cos(theta);
            sprite.position.y = radius * Math.sin(phi) * Math.sin(theta) * 0.9;
            sprite.position.z = radius * Math.cos(phi);
            
            // Store some properties for animation
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

            // Rotate heart slowly
            heart.rotation.y += 0.003;
            heart.rotation.x = Math.sin(elapsedTime * 0.1) * 0.1;
            heart.rotation.z = Math.cos(elapsedTime * 0.15) * 0.05;

            // Rotate particles
            particleSystem.rotation.y += 0.0005;
            particleSystem.rotation.x = Math.sin(elapsedTime * 0.02) * 0.05;

            // Animate floating love notes
            noteSprites.forEach((sprite, index) => {
                // Orbital motion
                const data = sprite.userData;
                data.angle += data.speed * delta * 30;
                
                // Slight vertical bobbing
                const floatY = Math.sin(elapsedTime * 0.8 + data.floatOffset) * 0.15;
                
                // Update position based on orbit
                const x = data.radius * Math.sin(data.phi) * Math.cos(data.angle);
                const y = data.radius * Math.sin(data.phi) * Math.sin(data.angle) * 0.9 + floatY;
                const z = data.radius * Math.cos(data.phi);
                
                sprite.position.set(x, y, z);
                
                // Slight scaling pulse
                const pulse = 1 + Math.sin(elapsedTime * 1.5 + index) * 0.05;
                const baseScale = (data.radius > 4) ? 0.9 : 1.1;
                sprite.scale.set(
                    sprite.scale.x * (0.99 + 0.01 * pulse),
                    sprite.scale.y * (0.99 + 0.01 * pulse),
                    1
                );
            });

            // Camera slight movement (gentle sway)
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

        // --- 9. Confetti Button Logic (using canvas-confetti library) ---
        // We'll load the library dynamically when the button is clicked
        document.getElementById('celebrate-btn').addEventListener('click', function() {
            import('https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js')
                .then(module => {
                    const confetti = module.default;
                    // Fire multiple bursts
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
                    
                    // And a big final burst after a tiny delay
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
                
            // Change button text temporarily
            const btn = document.getElementById('celebrate-btn');
            btn.textContent = '🎉 Wishes Coming True! ✨';
            btn.style.background = 'linear-gradient(145deg, #ffd166, #ff3b6f)';
            setTimeout(() => {
                btn.textContent = '🎉 Make Another Wish!';
                btn.style.background = 'linear-gradient(145deg, #ff8a9e, #ff3b6f)';
            }, 3000);
        });

        console.log('❤️ Happy Birthday! Made with love. ❤️');

    </script>
</body>
</html>
