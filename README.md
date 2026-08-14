<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Happy Birthday, My Love ❤️</title>
    <!-- Google Fonts -->
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

        /* --- Wish Card Overlay --- */
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
            outline: none;
            border-radius: 4px;
            padding: 4px 6px;
            transition: background 0.2s ease;
            cursor: text;
            min-height: 2.5rem;
        }

        .wish-card-body p:hover {
            background: rgba(139, 58, 58, 0.05);
        }

        .wish-card-body p:focus {
            background: rgba(139, 58, 58, 0.08);
            box-shadow: 0 0 0 2px rgba(139, 58, 58, 0.15);
        }

        .wish-card-body p:empty::before {
            content: "✏️ Click to write your wish...";
            color: #999;
            font-style: italic;
            font-weight: 300;
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
            outline: none;
            cursor: text;
            min-height: 3.5rem;
        }

        .wish-card-body .signature:hover {
            background: rgba(139, 58, 58, 0.05);
            border-radius: 4px;
        }

        .wish-card-body .signature:focus {
            background: rgba(139, 58, 58, 0.08);
            box-shadow: 0 0 0 2px rgba(139, 58, 58, 0.15);
            border-radius: 4px;
        }

        .wish-card-body .signature:empty::before {
            content: "✏️ Your name here...";
            color: #999;
            font-style: italic;
            font-weight: 300;
        }

        .edit-hint {
            text-align: center;
            font-size: 0.8rem;
            color: #8b3a3a;
            opacity: 0.6;
            margin-top: 8px;
            font-family: 'Playfair Display', serif;
            font-style: italic;
            letter-spacing: 0.5px;
            border-top: 1px dashed #d4c5a0;
            padding-top: 12px;
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

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

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

        /* --- MEMORY GALLERY PAGE --- */
        .memory-page {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #0a0a1a 0%, #1a0a1a 50%, #0a0a1a 100%);
            z-index: 200;
            overflow-y: auto;
            padding: 80px 20px 40px;
            animation: fadeIn 0.8s ease;
        }
        .memory-page.active {
            display: block;
        }

        .memory-header {
            text-align: center;
            color: #fff9e6;
            font-family: 'Dancing Script', cursive;
            font-size: clamp(2.5rem, 8vw, 4rem);
            margin-bottom: 40px;
            text-shadow: 0 0 30px rgba(255, 105, 180, 0.6);
            position: relative;
        }

        .memory-header::after {
            content: '❤️';
            display: block;
            font-size: 2rem;
            margin-top: 5px;
            opacity: 0.5;
        }

        .memory-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 40px 30px;
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
        }

        /* --- Polaroid Flip Card --- */
        .polaroid-card {
            perspective: 1500px;
            height: 380px;
            cursor: pointer;
            margin: 0 auto;
            width: 100%;
            max-width: 320px;
        }

        .polaroid-inner {
            position: relative;
            width: 100%;
            height: 100%;
            transition: transform 0.8s cubic-bezier(0.4, 0.2, 0.2, 1);
            transform-style: preserve-3d;
        }

        .polaroid-card.flipped .polaroid-inner {
            transform: rotateY(180deg);
        }

        .polaroid-front, .polaroid-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            border-radius: 8px 8px 8px 8px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            overflow: hidden;
        }

        .polaroid-front {
            background: #f5f0e8;
            padding: 12px 12px 50px 12px;
            transform: rotate(0deg);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .polaroid-front:hover {
            transform: rotate(0deg) scale(1.03);
            box-shadow: 0 15px 40px rgba(255, 105, 180, 0.3);
        }

        .polaroid-front .photo-container {
            width: 100%;
            height: 85%;
            overflow: hidden;
            border-radius: 4px;
            background: #ddd;
            position: relative;
        }

        .polaroid-front .photo-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .polaroid-front:hover .photo-container img {
            transform: scale(1.05);
        }

        .polaroid-front .photo-caption {
            text-align: center;
            font-family: 'Caveat', cursive;
            font-size: 1.1rem;
            color: #3d2b1f;
            padding: 8px 5px 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .polaroid-back {
            background: linear-gradient(145deg, #fdf6e3, #f5ede0);
            transform: rotateY(180deg);
            padding: 25px 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border: 1px solid rgba(139, 58, 58, 0.2);
            box-shadow: inset 0 0 30px rgba(180, 150, 100, 0.1);
        }

        .polaroid-back::before {
            content: '✧';
            font-size: 2rem;
            color: #8b3a3a;
            opacity: 0.3;
            margin-bottom: 10px;
        }

        .polaroid-back .memory-text {
            font-family: 'Caveat', cursive;
            font-size: 1.4rem;
            line-height: 1.8rem;
            color: #3d2b1f;
            text-align: center;
            font-weight: 600;
            padding: 10px;
            max-height: 80%;
            overflow-y: auto;
        }

        .polaroid-back .memory-text::-webkit-scrollbar {
            width: 4px;
        }
        .polaroid-back .memory-text::-webkit-scrollbar-track {
            background: #e8d5b5;
            border-radius: 10px;
        }
        .polaroid-back .memory-text::-webkit-scrollbar-thumb {
            background: #8b3a3a;
            border-radius: 10px;
        }

        .polaroid-back .flip-hint {
            font-size: 0.7rem;
            color: #8b3a3a;
            opacity: 0.4;
            margin-top: 10px;
            font-family: 'Playfair Display', serif;
            font-style: italic;
            letter-spacing: 1px;
        }

        /* --- Load More Button --- */
        .load-more-container {
            text-align: center;
            padding: 40px 20px 60px;
        }

        .load-more-btn {
            background: linear-gradient(145deg, #ff8a9e, #ff3b6f);
            color: white;
            border: none;
            padding: 18px 50px;
            font-size: 1.8rem;
            font-family: 'Dancing Script', cursive;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.4s ease;
            box-shadow: 0 0 40px rgba(255, 59, 111, 0.4);
            letter-spacing: 2px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
        }

        .load-more-btn::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 60%);
            animation: shimmer 3s infinite;
        }

        @keyframes shimmer {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .load-more-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 0 60px rgba(255, 59, 111, 0.6);
        }

        .load-more-btn:active {
            transform: scale(0.95);
        }

        .load-more-btn.all-shown {
            background: linear-gradient(145deg, #ffd166, #ff8a9e);
            animation: pulse-glow 2s ease-in-out infinite;
        }

        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 40px rgba(255, 215, 0, 0.4); }
            50% { box-shadow: 0 0 80px rgba(255, 215, 0, 0.8); }
        }

        /* --- Back to Heart Button --- */
        .back-to-heart {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 300;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #fff9e6;
            padding: 12px 25px;
            border-radius: 50px;
            font-family: 'Dancing Script', cursive;
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.3s ease;
            letter-spacing: 1px;
        }

        .back-to-heart:hover {
            background: rgba(255, 105, 180, 0.3);
            transform: scale(1.05);
            box-shadow: 0 0 30px rgba(255, 105, 180, 0.3);
        }

        /* ======================================== */
        /* ====== VIDEO PAGE STYLES ====== */
        /* ======================================== */
        .video-page {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #0a0a1a 0%, #1a0a2a 50%, #0a0a1a 100%);
            z-index: 300;
            overflow-y: auto;
            padding: 40px 20px;
            animation: fadeIn 0.8s ease;
        }
        .video-page.active {
            display: block;
        }

        .video-container {
            max-width: 900px;
            margin: 60px auto 40px;
            padding: 20px;
        }

        .video-header {
            text-align: center;
            color: #fff9e6;
            font-family: 'Dancing Script', cursive;
            font-size: clamp(2rem, 6vw, 3.5rem);
            margin-bottom: 30px;
            text-shadow: 0 0 30px rgba(255, 105, 180, 0.5);
        }

        .video-frame {
            position: relative;
            background: linear-gradient(145deg, #2a1a2a, #1a0a1a);
            padding: 20px;
            border-radius: 20px;
            box-shadow: 
                0 0 60px rgba(255, 59, 111, 0.2),
                inset 0 0 60px rgba(255, 59, 111, 0.05);
            border: 2px solid rgba(255, 105, 180, 0.2);
            transition: all 0.5s ease;
        }

        .video-frame::before {
            content: '';
            position: absolute;
            top: -3px;
            left: -3px;
            right: -3px;
            bottom: -3px;
            border-radius: 22px;
            background: linear-gradient(45deg, #ff3b6f, #ffd166, #ff3b6f);
            background-size: 300% 300%;
            animation: gradientBorder 4s ease-in-out infinite;
            z-index: -1;
            opacity: 0.3;
        }

        @keyframes gradientBorder {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .video-frame:hover {
            transform: scale(1.01);
            box-shadow: 0 0 80px rgba(255, 59, 111, 0.3);
        }

        .video-frame .video-wrapper {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%;
            background: #000;
            border-radius: 12px;
            overflow: hidden;
        }

        .video-frame .video-wrapper video,
        .video-frame .video-wrapper iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
            border-radius: 12px;
        }

        .video-frame .deco-corner {
            position: absolute;
            font-size: 1.5rem;
            opacity: 0.3;
            color: #ff6b8a;
        }

        .video-frame .deco-corner.tl { top: 10px; left: 15px; }
        .video-frame .deco-corner.tr { top: 10px; right: 15px; }
        .video-frame .deco-corner.bl { bottom: 10px; left: 15px; }
        .video-frame .deco-corner.br { bottom: 10px; right: 15px; }

        .video-caption {
            text-align: center;
            color: rgba(255, 255, 255, 0.6);
            font-family: 'Caveat', cursive;
            font-size: 1.3rem;
            margin-top: 20px;
            font-style: italic;
            letter-spacing: 1px;
        }

        .video-nav {
            text-align: center;
            margin-top: 30px;
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .video-nav-btn {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: #fff9e6;
            padding: 14px 30px;
            border-radius: 50px;
            font-family: 'Dancing Script', cursive;
            font-size: 1.3rem;
            cursor: pointer;
            transition: all 0.3s ease;
            letter-spacing: 1px;
        }

        .video-nav-btn:hover {
            background: rgba(255, 105, 180, 0.2);
            transform: scale(1.05);
            box-shadow: 0 0 30px rgba(255, 105, 180, 0.2);
        }

        /* ======================================== */
        /* ====== REMINDERS PAGE STYLES ====== */
        /* ======================================== */
        .reminders-page {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #0a0a1a 0%, #1a0a2a 50%, #0a0a1a 100%);
            z-index: 400;
            overflow-y: auto;
            padding: 40px 20px;
            animation: fadeIn 0.8s ease;
        }
        .reminders-page.active {
            display: block;
        }

        .reminders-header {
            text-align: center;
            color: #fff9e6;
            font-family: 'Dancing Script', cursive;
            font-size: clamp(2rem, 6vw, 3.5rem);
            margin: 40px 0 30px;
            text-shadow: 0 0 30px rgba(255, 105, 180, 0.5);
        }

        .reminders-header span {
            display: block;
            font-family: 'Playfair Display', serif;
            font-size: 1rem;
            opacity: 0.6;
            margin-top: 5px;
        }

        .reminder-icons {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            margin: 40px auto;
            max-width: 800px;
        }

        .reminder-icon {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 30px 40px;
            text-align: center;
            cursor: pointer;
            transition: all 0.4s ease;
            min-width: 150px;
            flex: 1;
            max-width: 200px;
        }

        .reminder-icon:hover {
            transform: translateY(-10px) scale(1.03);
            background: rgba(255, 105, 180, 0.1);
            border-color: rgba(255, 105, 180, 0.3);
            box-shadow: 0 10px 40px rgba(255, 105, 180, 0.15);
        }

        .reminder-icon .icon-emoji {
            font-size: 4rem;
            display: block;
            margin-bottom: 10px;
        }

        .reminder-icon .icon-label {
            color: #fff9e6;
            font-family: 'Dancing Script', cursive;
            font-size: 1.5rem;
            letter-spacing: 1px;
        }

        .reminder-content {
            display: none;
            max-width: 1000px;
            margin: 30px auto;
            padding: 20px;
            animation: fadeIn 0.6s ease;
        }
        .reminder-content.active {
            display: block;
        }

        .reminder-content .section-title {
            text-align: center;
            color: #fff9e6;
            font-family: 'Dancing Script', cursive;
            font-size: 2.5rem;
            margin-bottom: 30px;
            text-shadow: 0 0 20px rgba(255, 105, 180, 0.3);
        }

        /* ======================================== */
        /* ====== VINYL RECORD PLAYER ====== */
        /* ======================================== */
        .vinyl-player {
            max-width: 600px;
            margin: 0 auto;
            background: linear-gradient(145deg, #1a1a2a, #2a1a2a);
            border-radius: 30px;
            padding: 40px 35px 35px;
            border: 2px solid rgba(255, 105, 180, 0.15);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.6), inset 0 1px 0 rgba(255, 255, 255, 0.05);
            position: relative;
            overflow: hidden;
        }

        .vinyl-player::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle at 50% 50%, rgba(255, 105, 180, 0.03) 0%, transparent 70%);
            animation: rotateBg 20s linear infinite;
        }

        @keyframes rotateBg {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .vinyl-player .player-header {
            text-align: center;
            margin-bottom: 25px;
            position: relative;
            z-index: 1;
        }

        .vinyl-player .player-header .song-title {
            font-family: 'Dancing Script', cursive;
            font-size: 2rem;
            color: #fff9e6;
            text-shadow: 0 0 30px rgba(255, 105, 180, 0.3);
            letter-spacing: 1px;
        }

        .vinyl-player .player-header .song-artist {
            font-family: 'Caveat', cursive;
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.4);
            margin-top: 2px;
        }

        /* --- Vinyl Record --- */
        .vinyl-record {
            position: relative;
            width: 280px;
            height: 280px;
            margin: 0 auto 25px;
            cursor: pointer;
            z-index: 1;
        }

        .vinyl-record .record-disc {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: radial-gradient(circle at 50% 50%, 
                #1a1a1a 0%, 
                #2a2a2a 15%, 
                #1a1a1a 20%, 
                #2a2a2a 25%, 
                #1a1a1a 30%,
                #2a2a2a 35%,
                #1a1a1a 40%,
                #2a2a2a 45%,
                #1a1a1a 50%,
                #2a2a2a 55%,
                #1a1a1a 60%,
                #2a2a2a 65%,
                #1a1a1a 70%,
                #2a2a2a 75%,
                #1a1a1a 80%,
                #2a2a2a 85%,
                #1a1a1a 90%,
                #2a2a2a 95%,
                #1a1a1a 100%
            );
            box-shadow: 
                0 0 60px rgba(255, 105, 180, 0.15),
                inset 0 0 40px rgba(0, 0, 0, 0.8),
                inset 0 0 80px rgba(0, 0, 0, 0.5);
            position: relative;
            transition: transform 0.1s linear;
            animation: recordSpin 0s linear infinite;
        }

        .vinyl-record .record-disc.playing {
            animation: recordSpin 2s linear infinite;
        }

        @keyframes recordSpin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Record label in center */
        .vinyl-record .record-label {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: radial-gradient(circle at 30% 30%, #ff6b8a, #ff3b6f);
            box-shadow: 0 0 30px rgba(255, 59, 111, 0.3);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border: 2px solid rgba(255, 255, 255, 0.1);
        }

        .vinyl-record .record-label .label-text {
            font-family: 'Dancing Script', cursive;
            font-size: 0.7rem;
            color: #fff9e6;
            text-align: center;
            line-height: 1.2;
            letter-spacing: 0.5px;
        }

        .vinyl-record .record-label .label-heart {
            font-size: 1.2rem;
            margin-top: 2px;
        }

        /* Center hole */
        .vinyl-record .center-hole {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #0a0a1a;
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.8);
            z-index: 2;
        }

        /* --- Vinyl Tone Arm --- */
        .vinyl-player .tone-arm {
            position: absolute;
            top: 30px;
            right: 60px;
            width: 60px;
            height: 4px;
            background: linear-gradient(to right, #888, #ccc);
            transform-origin: right center;
            transform: rotate(-45deg);
            border-radius: 2px;
            z-index: 5;
            transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .vinyl-player .tone-arm.playing {
            transform: rotate(-20deg);
        }

        .vinyl-player .tone-arm::after {
            content: '';
            position: absolute;
            right: -8px;
            top: -6px;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: radial-gradient(circle at 30% 30%, #ddd, #999);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .vinyl-player .tone-arm .arm-base {
            position: absolute;
            right: -12px;
            top: -14px;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: radial-gradient(circle at 30% 30%, #bbb, #777);
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.4);
        }

        /* --- Play Button --- */
        .vinyl-player .play-btn {
            display: block;
            margin: 0 auto;
            padding: 18px 50px;
            font-family: 'Dancing Script', cursive;
            font-size: 1.8rem;
            background: linear-gradient(145deg, #ff8a9e, #ff3b6f);
            color: white;
            border: none;
            border-radius: 60px;
            cursor: pointer;
            transition: all 0.4s ease;
            box-shadow: 0 0 40px rgba(255, 59, 111, 0.3);
            letter-spacing: 2px;
            position: relative;
            z-index: 1;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .vinyl-player .play-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 0 60px rgba(255, 59, 111, 0.5);
        }

        .vinyl-player .play-btn:active {
            transform: scale(0.95);
        }

        .vinyl-player .play-btn.playing {
            background: linear-gradient(145deg, #ffd166, #ff8a9e);
            animation: pulseGlow 1.5s ease-in-out infinite;
        }

        @keyframes pulseGlow {
            0%, 100% { box-shadow: 0 0 40px rgba(255, 215, 0, 0.3); }
            50% { box-shadow: 0 0 80px rgba(255, 215, 0, 0.6); }
        }

        /* --- YouTube Embed (hidden initially) --- */
        .vinyl-player .video-embed-container {
            display: none;
            margin-top: 20px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
            position: relative;
            z-index: 1;
        }

        .vinyl-player .video-embed-container.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        .vinyl-player .video-embed-container iframe {
            width: 100%;
            aspect-ratio: 16/9;
            border: none;
            display: block;
        }

        /* --- Food Section --- */
        .food-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            max-width: 900px;
            margin: 0 auto;
        }

        .food-item {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 16px;
            padding: 20px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.08);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .food-item::before {
            content: '🍽️';
            position: absolute;
            top: -20px;
            right: -20px;
            font-size: 6rem;
            opacity: 0.05;
        }

        .food-item:hover {
            transform: translateY(-5px);
            border-color: rgba(255, 215, 0, 0.3);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .food-item .food-image {
            width: 100%;
            height: 200px;
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 15px;
            background: #1a1a2a;
            position: relative;
        }

        .food-item .food-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .food-item:hover .food-image img {
            transform: scale(1.05);
        }

        .food-item .food-name {
            color: #ffd166;
            font-family: 'Dancing Script', cursive;
            font-size: 1.5rem;
        }

        .food-item .food-desc {
            color: rgba(255, 255, 255, 0.6);
            font-family: 'Caveat', cursive;
            font-size: 1.1rem;
            margin-top: 5px;
        }

        /* --- Place Section --- */
        .place-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            max-width: 900px;
            margin: 0 auto;
        }

        .place-item {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 16px;
            padding: 20px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.08);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .place-item::before {
            content: '📍';
            position: absolute;
            top: -20px;
            right: -20px;
            font-size: 6rem;
            opacity: 0.05;
        }

        .place-item:hover {
            transform: translateY(-5px);
            border-color: rgba(100, 200, 255, 0.3);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .place-item .place-image {
            width: 100%;
            height: 200px;
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 15px;
            background: #1a1a2a;
            position: relative;
        }

        .place-item .place-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .place-item:hover .place-image img {
            transform: scale(1.05);
        }

        .place-item .place-name {
            color: #6c9eff;
            font-family: 'Dancing Script', cursive;
            font-size: 1.5rem;
        }

        .place-item .place-desc {
            color: rgba(255, 255, 255, 0.6);
            font-family: 'Caveat', cursive;
            font-size: 1.1rem;
            margin-top: 5px;
        }

        .reminders-back {
            text-align: center;
            margin-top: 40px;
            padding-bottom: 40px;
        }

        .reminders-back-btn {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: #fff9e6;
            padding: 14px 35px;
            border-radius: 50px;
            font-family: 'Dancing Script', cursive;
            font-size: 1.3rem;
            cursor: pointer;
            transition: all 0.3s ease;
            letter-spacing: 1px;
        }

        .reminders-back-btn:hover {
            background: rgba(255, 105, 180, 0.2);
            transform: scale(1.05);
            box-shadow: 0 0 30px rgba(255, 105, 180, 0.2);
        }

        /* --- Responsive --- */
        @media (max-width: 768px) {
            .memory-grid {
                grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
                gap: 30px 20px;
                padding: 10px;
            }
            .polaroid-card {
                height: 340px;
                max-width: 280px;
            }
            .polaroid-back .memory-text {
                font-size: 1.2rem;
                line-height: 1.6rem;
            }
            .memory-header {
                font-size: 2rem;
                margin-bottom: 30px;
            }
            .load-more-btn {
                font-size: 1.4rem;
                padding: 15px 35px;
            }
            .reminder-icons {
                gap: 15px;
            }
            .reminder-icon {
                padding: 20px;
                min-width: 100px;
            }
            .reminder-icon .icon-emoji {
                font-size: 3rem;
            }
            .video-container {
                padding: 10px;
                margin: 40px auto 20px;
            }
            .video-frame {
                padding: 12px;
            }
            .video-nav {
                flex-direction: column;
                align-items: center;
            }
            .video-nav-btn {
                width: 80%;
            }

            /* Vinyl responsive */
            .vinyl-record {
                width: 220px;
                height: 220px;
            }
            .vinyl-record .record-label {
                width: 65px;
                height: 65px;
            }
            .vinyl-record .record-label .label-text {
                font-size: 0.6rem;
            }
            .vinyl-player {
                padding: 30px 20px 25px;
            }
            .vinyl-player .player-header .song-title {
                font-size: 1.6rem;
            }
            .vinyl-player .play-btn {
                padding: 14px 35px;
                font-size: 1.4rem;
            }
            .vinyl-player .tone-arm {
                right: 30px;
                width: 40px;
            }
        }

        @media (max-width: 480px) {
            .memory-grid {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 25px 15px;
            }
            .polaroid-card {
                height: 300px;
                max-width: 240px;
            }
            .polaroid-back .memory-text {
                font-size: 1rem;
                line-height: 1.4rem;
            }
            .back-to-heart {
                top: 10px;
                right: 10px;
                padding: 8px 18px;
                font-size: 1rem;
            }
            .food-grid,
            .place-grid {
                grid-template-columns: 1fr;
            }
            .reminder-icon {
                min-width: 80px;
                padding: 15px;
            }
            .reminder-icon .icon-emoji {
                font-size: 2.5rem;
            }
            .vinyl-record {
                width: 180px;
                height: 180px;
            }
            .vinyl-record .record-label {
                width: 55px;
                height: 55px;
            }
            .vinyl-record .record-label .label-text {
                font-size: 0.5rem;
            }
            .vinyl-player .tone-arm {
                right: 15px;
                width: 30px;
                top: 15px;
            }
        }
    </style>
</head>
<body>

    <!-- ====== MAIN PAGE ====== -->
    <div id="title">
        <h1>🎂 Happy Birthday, [Your Partner's Name]!</h1>
        <p>You are my everything. My world shines brighter with you. ✨</p>
    </div>

    <button id="celebrate-btn">🎉 Make a Wish!</button>

    <!-- Wish Card Overlay -->
    <div id="wish-card-overlay">
        <div class="wish-card">
            <span class="deco-left">🌸</span>
            <span class="deco-right">🌹</span>
            <div class="wish-card-content">
                <div class="wish-card-header">💌 My Dearest Love</div>
                <div class="wish-card-body">
                    <p contenteditable="true">On this special day, I just want to remind you how incredibly amazing you are. You light up my world in ways you'll never fully understand.</p>
                    <p contenteditable="true">Every moment with you is a treasure, every laugh shared is a melody, and every day I spend with you is a gift I'm eternally grateful for.</p>
                    <p contenteditable="true">Today, we celebrate you — the most beautiful soul I've ever known. May your year ahead be filled with as much joy and wonder as you bring into my life every single day.</p>
                    <p contenteditable="true">I love you more than words can say, more than stars in the sky, and more than all the birthdays to come.</p>
                    <div class="signature" contenteditable="true">Forever yours, <br> ❤️ [Your Name]</div>
                    <div class="edit-hint">✏️ Click any text above to edit your personal wish</div>
                </div>
                <div class="wish-card-footer">
                    <button class="close-card-btn" id="close-card-btn">✨ Back to the Magic ✨</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ====== MEMORY GALLERY PAGE ====== -->
    <div id="memory-page" class="memory-page">
        <button class="back-to-heart" id="back-to-heart-btn">❤️ Back to Heart</button>
        
        <div class="memory-header">
            📸 Our Beautiful Memories
            <span style="font-size: 1.5rem; display: block; font-family: 'Playfair Display', serif; opacity: 0.7;">Click a photo to flip and read the memory</span>
        </div>

        <div id="memory-grid" class="memory-grid"></div>

        <div class="load-more-container">
            <button class="load-more-btn" id="load-more-btn">🎀 Want More? 🎀</button>
        </div>
    </div>

    <!-- ====== VIDEO PAGE ====== -->
    <div id="video-page" class="video-page">
        <button class="back-to-heart" id="video-back-btn" style="position:fixed; top:20px; right:20px; z-index:301;">❤️ Back</button>
        
        <div class="video-container">
            <div class="video-header">🎬 A Special Message For You</div>
            
            <div class="video-frame">
                <span class="deco-corner tl">✦</span>
                <span class="deco-corner tr">✦</span>
                <span class="deco-corner bl">✦</span>
                <span class="deco-corner br">✦</span>
                
                <div class="video-wrapper">
                    <video controls playsinline>
                        <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
            
            <div class="video-caption">💕 A minute of memories, a lifetime of love 💕</div>
            
            <div class="video-nav">
                <button class="video-nav-btn" id="to-reminders-btn">💝 Things That Remind Me of You</button>
                <button class="video-nav-btn" id="video-back-to-memory-btn">📸 Back to Memories</button>
            </div>
        </div>
    </div>

    <!-- ====== REMINDERS PAGE ====== -->
    <div id="reminders-page" class="reminders-page">
        <button class="back-to-heart" id="reminders-back-btn" style="position:fixed; top:20px; right:20px; z-index:401;">❤️ Back</button>
        
        <div class="reminders-header">
            💝 Things That Remind Me of You
            <span>Click an icon to explore</span>
        </div>

        <div class="reminder-icons">
            <div class="reminder-icon" data-section="music">
                <span class="icon-emoji">🎵</span>
                <span class="icon-label">Music</span>
            </div>
            <div class="reminder-icon" data-section="food">
                <span class="icon-emoji">🍕</span>
                <span class="icon-label">Food</span>
            </div>
            <div class="reminder-icon" data-section="place">
                <span class="icon-emoji">🌅</span>
                <span class="icon-label">Places</span>
            </div>
        </div>

        <!-- ====== MUSIC SECTION - VINYL RECORD PLAYER ====== -->
        <div id="music-section" class="reminder-content">
            <div class="section-title">🎵 The Song That Makes Me Think of You</div>
            
            <div class="vinyl-player">
                <div class="player-header">
                    <div class="song-title">❤️ My Heart</div>
                    <div class="song-artist">A song that speaks of you</div>
                </div>

                <!-- Vinyl Record -->
                <div class="vinyl-record" id="vinylRecord">
                    <div class="record-disc" id="recordDisc">
                        <div class="record-label">
                            <span class="label-text">For You</span>
                            <span class="label-heart">❤️</span>
                        </div>
                    </div>
                    <div class="center-hole"></div>
                </div>

                <!-- Tone Arm -->
                <div class="tone-arm" id="toneArm">
                    <div class="arm-base"></div>
                </div>

                <!-- Play Button -->
                <button class="play-btn" id="playBtn">▶ Play the Song</button>

                <!-- YouTube Embed (hidden initially) -->
                <div class="video-embed-container" id="videoEmbed">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/VR4UM-LsPiU?si=p4tay8ly2AJk1yCV" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>

        <!-- ====== FOOD SECTION ====== -->
        <div id="food-section" class="reminder-content">
            <div class="section-title">🍕 Foods We Love Together</div>
            <div class="food-grid">
                <div class="food-item">
                    <div class="food-image">
                        <img src="https://images.unsplash.com/photo-1513104890138-7c749659a591?w=400&h=300&fit=crop" alt="Pizza">
                    </div>
                    <div class="food-name">🍕 Pizza</div>
                    <div class="food-desc">Our first date meal. Still our favorite!</div>
                </div>
                <div class="food-item">
                    <div class="food-image">
                        <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=400&h=300&fit=crop" alt="Pasta">
                    </div>
                    <div class="food-name">🍝 Pasta</div>
                    <div class="food-desc">The night you cooked for me. Perfection.</div>
                </div>
                <div class="food-item">
                    <div class="food-image">
                        <img src="https://images.unsplash.com/photo-1579952363873-27f3bade9f55?w=400&h=300&fit=crop" alt="Ice Cream">
                    </div>
                    <div class="food-name">🍦 Ice Cream</div>
                    <div class="food-desc">Late night walks and sweet treats.</div>
                </div>
            </div>
        </div>

        <!-- ====== PLACE SECTION ====== -->
        <div id="place-section" class="reminder-content">
            <div class="section-title">🌅 Places That Hold Our Memories</div>
            <div class="place-grid">
                <div class="place-item">
                    <div class="place-image">
                        <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=400&h=300&fit=crop" alt="Beach">
                    </div>
                    <div class="place-name">🏖️ The Beach</div>
                    <div class="place-desc">Where we watched our first sunset together.</div>
                </div>
                <div class="place-item">
                    <div class="place-image">
                        <img src="https://images.unsplash.com/photo-1514924013411-cbf25faa35bb?w=400&h=300&fit=crop" alt="Cafe">
                    </div>
                    <div class="place-name">☕ Our Cafe</div>
                    <div class="place-desc">Our little corner of the world.</div>
                </div>
                <div class="place-item">
                    <div class="place-image">
                        <img src="https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?w=400&h=300&fit=crop" alt="Park">
                    </div>
                    <div class="place-name">🌳 The Park</div>
                    <div class="place-desc">Where we had our first picnic.</div>
                </div>
            </div>
        </div>

        <div class="reminders-back">
            <button class="reminders-back-btn" id="reminders-back-to-video-btn">🎬 Back to Video</button>
        </div>
    </div>

    <!-- 3D Scene Container -->
    <div id="three-container"></div>

    <!-- Import Three.js -->
    <script type="importmap">
        {
            "imports": {
                "three": "https://unpkg.com/three@0.128.0/build/three.module.js"
            }
        }
    </script>

    <script type="module">
        import * as THREE from 'three';

        // --- THREE.JS SCENE SETUP ---
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

        // --- Lights ---
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

        // --- Create Heart ---
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

        // --- Particles ---
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

        // --- Floating Sprites ---
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

        // --- Glow ---
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

        // --- Animation Loop ---
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

        const clock = new THREE.Clock();
        animate();

        // --- Resize Handler ---
        window.addEventListener('resize', onWindowResize, false);
        function onWindowResize() {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        }

        // ==========================================
        // ====== VINYL PLAYER LOGIC ======
        // ==========================================
        const playBtn = document.getElementById('playBtn');
        const recordDisc = document.getElementById('recordDisc');
        const toneArm = document.getElementById('toneArm');
        const videoEmbed = document.getElementById('videoEmbed');
        const vinylRecord = document.getElementById('vinylRecord');
        let isPlaying = false;

        playBtn.addEventListener('click', function() {
            if (!isPlaying) {
                // Start playing
                isPlaying = true;
                this.textContent = '⏹ Stop';
                this.classList.add('playing');
                recordDisc.classList.add('playing');
                toneArm.classList.add('playing');
                videoEmbed.classList.add('active');
                
                // Auto-play the YouTube video by loading it with autoplay
                const iframe = videoEmbed.querySelector('iframe');
                const src = iframe.src;
                // Add autoplay parameter if not already there
                if (!src.includes('autoplay=1')) {
                    iframe.src = src + (src.includes('?') ? '&' : '?') + 'autoplay=1';
                }
                
                // Add visual feedback on the record
                vinylRecord.style.transform = 'scale(1.02)';
                setTimeout(() => {
                    vinylRecord.style.transform = 'scale(1)';
                }, 300);
                
            } else {
                // Stop playing
                isPlaying = false;
                this.textContent = '▶ Play the Song';
                this.classList.remove('playing');
                recordDisc.classList.remove('playing');
                toneArm.classList.remove('playing');
                videoEmbed.classList.remove('active');
                
                // Reset the iframe to stop video
                const iframe = videoEmbed.querySelector('iframe');
                const src = iframe.src.replace('&autoplay=1', '').replace('autoplay=1&', '').replace('autoplay=1', '');
                iframe.src = src;
            }
        });

        // Also allow clicking on the record to toggle play
        vinylRecord.addEventListener('click', function() {
            playBtn.click();
        });

        // ==========================================
        // ====== PAGE NAVIGATION LOGIC ======
        // ==========================================

        // DOM References
        const memoryPage = document.getElementById('memory-page');
        const videoPage = document.getElementById('video-page');
        const remindersPage = document.getElementById('reminders-page');
        const memoryGrid = document.getElementById('memory-grid');
        const loadMoreBtn = document.getElementById('load-more-btn');
        const backToHeartBtn = document.getElementById('back-to-heart-btn');
        const celebrateBtn = document.getElementById('celebrate-btn');
        const wishCardOverlay = document.getElementById('wish-card-overlay');
        const closeCardBtn = document.getElementById('close-card-btn');
        const videoBackBtn = document.getElementById('video-back-btn');
        const toRemindersBtn = document.getElementById('to-reminders-btn');
        const videoBackToMemoryBtn = document.getElementById('video-back-to-memory-btn');
        const remindersBackBtn = document.getElementById('reminders-back-btn');
        const remindersBackToVideoBtn = document.getElementById('reminders-back-to-video-btn');

        // Reminder icons
        const reminderIcons = document.querySelectorAll('.reminder-icon');
        const reminderSections = {
            music: document.getElementById('music-section'),
            food: document.getElementById('food-section'),
            place: document.getElementById('place-section')
        };

        // --- Memory Data ---
        const memoryData = [
            {
                photo: 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=400&h=400&fit=crop',
                text: 'Our first date at the beach. The sunset was beautiful, but you were even more stunning. 🌅'
            },
            {
                photo: 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?w=400&h=400&fit=crop',
                text: 'That time we got lost in the city and found this hidden cafe. Best coffee and even better company. ☕'
            },
            {
                photo: 'https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=400&h=400&fit=crop',
                text: 'Our first vacation together. You made every moment magical. ✈️'
            },
            {
                photo: 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=400&h=400&fit=crop',
                text: 'Date night at the rooftop restaurant. The view was amazing, but you were the real star. 🌃'
            },
            {
                photo: 'https://images.unsplash.com/photo-1558618666-fcd25c85f2d6?w=400&h=400&fit=crop',
                text: 'That rainy afternoon we spent dancing in the kitchen. My favorite kind of weather. 💃'
            },
            {
                photo: 'https://images.unsplash.com/photo-1467810563316-b5476525c0f9?w=400&h=400&fit=crop',
                text: 'Our first New Year\'s Eve together. You made my heart skip a beat at midnight. 🎆'
            },
            {
                photo: 'https://images.unsplash.com/photo-1523712999610-f77fbcfc3843?w=400&h=400&fit=crop',
                text: 'Spring blossoms and your smile - the perfect combination. 🌸'
            },
            {
                photo: 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?w=400&h=400&fit=crop',
                text: 'That spontaneous road trip we took. Best decision ever! 🚗'
            },
            {
                photo: 'https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?w=400&h=400&fit=crop',
                text: 'Cozy movie nights with you are my favorite thing in the world. 🎬'
            },
            {
                photo: 'https://images.unsplash.com/photo-1519681393784-d120267933ba?w=400&h=400&fit=crop',
                text: 'You make even the ordinary days feel extraordinary. 🌟'
            },
            {
                photo: 'https://images.unsplash.com/photo-1512389142860-9c449e58a714?w=400&h=400&fit=crop',
                text: 'Our first Christmas together. You made it so special. 🎄'
            },
            {
                photo: 'https://images.unsplash.com/photo-1516589178581-6cd7833ae3b2?w=400&h=400&fit=crop',
                text: 'Every day with you is a new adventure. I love you endlessly. ❤️'
            }
        ];

        let allMemories = [...memoryData];
        let currentBatch = 0;
        const perBatch = 6;

        // --- Helper: Create a Polaroid Card ---
        function createPolaroidCard(data, index) {
            const card = document.createElement('div');
            card.className = 'polaroid-card';
            card.dataset.index = index;

            card.innerHTML = `
                <div class="polaroid-inner">
                    <div class="polaroid-front">
                        <div class="photo-container">
                            <img src="${data.photo}" alt="Memory ${index + 1}" loading="lazy">
                        </div>
                        <div class="photo-caption">✧ Click to flip ✧</div>
                    </div>
                    <div class="polaroid-back">
                        <div class="memory-text">${data.text}</div>
                        <div class="flip-hint">click to flip back</div>
                    </div>
                </div>
            `;

            card.addEventListener('click', function(e) {
                if (e.target.closest('.close-card-btn') || e.target.closest('.load-more-btn')) {
                    return;
                }
                this.classList.toggle('flipped');
            });

            return card;
        }

        // --- Render Batch ---
        function renderBatch(startIndex) {
            const endIndex = Math.min(startIndex + perBatch, allMemories.length);
            const fragment = document.createDocumentFragment();

            for (let i = startIndex; i < endIndex; i++) {
                const card = createPolaroidCard(allMemories[i], i);
                fragment.appendChild(card);
            }

            memoryGrid.appendChild(fragment);

            if (endIndex >= allMemories.length) {
                loadMoreBtn.textContent = '🎬 Watch Our Video 🎬';
                loadMoreBtn.className = 'load-more-btn all-shown';
                loadMoreBtn.disabled = false;
                loadMoreBtn.dataset.allShown = 'true';
            } else {
                loadMoreBtn.disabled = false;
                loadMoreBtn.textContent = `🎀 Want More? (${allMemories.length - endIndex} more) 🎀`;
                loadMoreBtn.className = 'load-more-btn';
                loadMoreBtn.dataset.allShown = 'false';
            }

            const newCards = memoryGrid.querySelectorAll('.polaroid-card:not(.animated)');
            newCards.forEach((card, idx) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                setTimeout(() => {
                    card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                    card.classList.add('animated');
                }, 100 + idx * 80);
            });
        }

        // --- Load More / Navigate to Video ---
        function handleLoadMore() {
            if (loadMoreBtn.dataset.allShown === 'true') {
                showVideoPage();
                return;
            }

            const start = currentBatch * perBatch;
            if (start >= allMemories.length) {
                return;
            }
            renderBatch(start);
            currentBatch++;
        }

        // --- Page Navigation Functions ---
        function showMemoryPage() {
            wishCardOverlay.classList.remove('active');
            if (currentBatch === 0) {
                memoryGrid.innerHTML = '';
                allMemories = [...memoryData];
                currentBatch = 0;
                loadMoreBtn.textContent = '🎀 Want More? 🎀';
                loadMoreBtn.className = 'load-more-btn';
                loadMoreBtn.dataset.allShown = 'false';
                loadMore();
            }
            memoryPage.classList.add('active');
            videoPage.classList.remove('active');
            remindersPage.classList.remove('active');
            document.body.style.overflow = 'hidden';
        }

        function showVideoPage() {
            memoryPage.classList.remove('active');
            videoPage.classList.add('active');
            remindersPage.classList.remove('active');
            document.body.style.overflow = 'hidden';
        }

        function showRemindersPage() {
            videoPage.classList.remove('active');
            remindersPage.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function hideAllPages() {
            memoryPage.classList.remove('active');
            videoPage.classList.remove('active');
            remindersPage.classList.remove('active');
            wishCardOverlay.classList.remove('active');
            document.body.style.overflow = 'hidden';
        }

        function loadMore() {
            const start = currentBatch * perBatch;
            if (start >= allMemories.length) {
                return;
            }
            renderBatch(start);
            currentBatch++;
        }

        // --- Event Listeners ---

        celebrateBtn.addEventListener('click', function() {
            wishCardOverlay.classList.add('active');
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
                .catch(err => console.log('Confetti library failed to load'));

            celebrateBtn.textContent = '🎉 Wishes Coming True! ✨';
            celebrateBtn.style.background = 'linear-gradient(145deg, #ffd166, #ff3b6f)';
            setTimeout(() => {
                celebrateBtn.textContent = '🎉 Make Another Wish!';
                celebrateBtn.style.background = 'linear-gradient(145deg, #ff8a9e, #ff3b6f)';
            }, 3000);
        });

        closeCardBtn.addEventListener('click', function() {
            wishCardOverlay.classList.remove('active');
            showMemoryPage();
        });

        wishCardOverlay.addEventListener('click', function(e) {
            if (e.target === this) {
                wishCardOverlay.classList.remove('active');
            }
        });

        backToHeartBtn.addEventListener('click', hideAllPages);
        loadMoreBtn.addEventListener('click', handleLoadMore);

        videoBackBtn.addEventListener('click', hideAllPages);
        videoBackToMemoryBtn.addEventListener('click', showMemoryPage);
        toRemindersBtn.addEventListener('click', showRemindersPage);

        remindersBackBtn.addEventListener('click', hideAllPages);
        remindersBackToVideoBtn.addEventListener('click', showVideoPage);

        reminderIcons.forEach(icon => {
            icon.addEventListener('click', function() {
                const section = this.dataset.section;
                
                Object.values(reminderSections).forEach(el => {
                    el.classList.remove('active');
                });
                
                if (reminderSections[section]) {
                    reminderSections[section].classList.add('active');
                }
                
                reminderIcons.forEach(i => i.style.borderColor = 'rgba(255,255,255,0.1)');
                this.style.borderColor = 'rgba(255,105,180,0.5)';
            });
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                if (wishCardOverlay.classList.contains('active')) {
                    wishCardOverlay.classList.remove('active');
                } else if (remindersPage.classList.contains('active')) {
                    showVideoPage();
                } else if (videoPage.classList.contains('active')) {
                    hideAllPages();
                } else if (memoryPage.classList.contains('active')) {
                    hideAllPages();
                }
            }
        });

        loadMore();

        console.log('❤️ Happy Birthday! Made with love. ❤️');
        console.log('🎵 Vinyl record player loaded! Click play to listen.');
    </script>
</body>
</html>
