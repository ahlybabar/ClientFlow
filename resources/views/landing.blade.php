<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClientFlow Pro - The Ultimate Project & Client Management Platform</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@500;700;900&display=swap"
        rel="stylesheet">
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --bg: #F9FAFB;
            --surface: rgba(255, 255, 255, 0.7);
            --border: rgba(0, 0, 0, 0.08);
            --indigo: #4F7CFF;
            --purple: #7C3AED;
            --indigo-light: #A5B4FC;
            --text-muted: #9CA3AF;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg);
            color: #111827;
            overflow-x: hidden;
            line-height: 1.6;
        }

        h1,
        h2,
        h3,
        h4,
        .font-display {
            font-family: 'Outfit', sans-serif;
        }

        /* ─── Utility ─── */
        .glass {
            background: var(--surface);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid var(--border);
        }

        .gradient-text {
            background: linear-gradient(135deg, #A5B4FC 0%, #6366F1 50%, #C084FC 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* ─── Nav ─── */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
            transition: background .3s;
        }

        nav.scrolled {
            background: rgba(255, 255, 255, .85);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
        }

        .nav-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 76px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: linear-gradient(135deg, #4F7CFF, #7C3AED);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 20px rgba(79, 124, 255, .3);
        }

        .logo-text {
            font-family: 'Outfit', sans-serif;
            font-weight: 700;
            font-size: 20px;
            color: #111827;
        }

        .nav-links {
            display: flex;
            gap: 36px;
            list-style: none;
        }

        .nav-links a {
            color: #4B5563;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            transition: color .2s;
        }

        .nav-links a:hover {
            color: #111827;
        }

        .nav-cta {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .btn-ghost {
            color: #4B5563;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            transition: color .2s;
        }

        .btn-ghost:hover {
            color: #111827;
        }

        .btn-primary {
            padding: 10px 22px;
            border-radius: 999px;
            font-size: 14px;
            font-weight: 600;
            color: #fff;
            background: linear-gradient(135deg, #4F7CFF, #7C3AED);
            text-decoration: none;
            transition: all .2s;
            box-shadow: 0 4px 20px rgba(79, 124, 255, .25);
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 28px rgba(79, 124, 255, .4);
        }

        /* ─── Hero ─── */
        .hero {
            position: relative;
            padding: 160px 0 100px;
            text-align: center;
            overflow: hidden;
        }

        .hero-glow {
            position: absolute;
            width: 700px;
            height: 700px;
            background: radial-gradient(circle, rgba(79, 70, 229, .18) 0%, transparent 70%);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            pointer-events: none;
        }

        .hero-blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            pointer-events: none;
            opacity: .45;
        }

        .hero-blob-1 {
            width: 400px;
            height: 400px;
            background: #4F7CFF22;
            top: 10%;
            left: 15%;
            animation: pulseBlob 7s ease-in-out infinite;
        }

        .hero-blob-2 {
            width: 350px;
            height: 350px;
            background: #7C3AED22;
            bottom: 15%;
            right: 15%;
            animation: pulseBlob 7s ease-in-out 3.5s infinite;
        }

        @keyframes pulseBlob {

            0%,
            100% {
                transform: scale(1)
            }

            50% {
                transform: scale(1.15)
            }
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 14px;
            border-radius: 999px;
            background: var(--surface);
            border: 1px solid rgba(99, 102, 241, .4);
            margin-bottom: 28px;
        }

        .badge-dot {
            position: relative;
            width: 8px;
            height: 8px;
        }

        .badge-dot span {
            position: absolute;
            inset: 0;
            border-radius: 50%;
            background: #818CF8;
        }

        .badge-dot span.ping {
            animation: ping .9s cubic-bezier(0, 0, .2, 1) infinite;
            background: #818CF8;
            opacity: .75;
        }

        @keyframes ping {

            75%,
            100% {
                transform: scale(2);
                opacity: 0
            }
        }

        .badge-text {
            font-size: 11px;
            font-weight: 600;
            color: #4F7CFF;
            letter-spacing: .08em;
            text-transform: uppercase;
        }

        .hero h1 {
            font-size: clamp(3rem, 7vw, 5.5rem);
            font-weight: 900;
            line-height: 1.08;
            margin-bottom: 24px;
            letter-spacing: -.02em;
        }

        .hero p {
            font-size: clamp(1rem, 2vw, 1.2rem);
            color: #4B5563;
            max-width: 560px;
            margin: 0 auto 40px;
        }

        .hero-actions {
            display: flex;
            justify-content: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        .btn-hero {
            padding: 16px 32px;
            border-radius: 999px;
            font-size: 16px;
            font-weight: 700;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all .25s;
        }

        .btn-hero-primary {
            color: #fff;
            background: linear-gradient(135deg, #4F7CFF, #7C3AED);
            box-shadow: 0 8px 32px rgba(79, 124, 255, .3);
        }

        .btn-hero-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 40px rgba(79, 124, 255, .45);
        }

        .btn-hero-secondary {
            color: #111827;
            background: var(--surface);
            border: 1px solid var(--border);
        }

        .btn-hero-secondary:hover {
            background: rgba(0, 0, 0, .07);
        }

        /* Mockup */
        .mockup-wrap {
            margin-top: 64px;
            position: relative;
        }

        .mockup-outer {
            border-radius: 20px;
            padding: 1px;
            background: linear-gradient(180deg, rgba(0, 0, 0, .12) 0%, transparent 100%);
            box-shadow: 0 40px 100px rgba(0, 0, 0, .6);
            animation: float 6s ease-in-out infinite;
        }

        .mockup-inner {
            border-radius: 18px;
            overflow: hidden;
            border: 1px solid rgba(0, 0, 0, .06);
        }

        .mockup-bar {
            height: 40px;
            background: rgba(0, 0, 0, .5);
            border-bottom: 1px solid rgba(0, 0, 0, .05);
            display: flex;
            align-items: center;
            padding: 0 16px;
            gap: 6px;
        }

        .dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        .dot-r {
            background: #FF5F57;
        }

        .dot-y {
            background: #FEBC2E;
        }

        .dot-g {
            background: #28C840;
        }

        .mockup-url {
            margin: 0 auto;
            background: rgba(0, 0, 0, .5);
            height: 22px;
            width: 240px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            color: #6B7280;
            font-family: monospace;
        }

        .mockup-body {
            background: #F3F4F6;
            aspect-ratio: 16/9;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .mockup-body img {
            width: 60%;
            max-width: 420px;
            object-fit: contain;
            filter: drop-shadow(0 20px 40px rgba(0, 0, 0, .5));
            z-index: 2;
            position: relative;
        }

        .float-card {
            position: absolute;
            border-radius: 14px;
            padding: 14px 18px;
            animation: float 5s ease-in-out infinite;
        }

        .float-card-1 {
            top: 18%;
            left: 6%;
            animation-delay: 0s;
        }

        .float-card-2 {
            bottom: 18%;
            right: 6%;
            animation-delay: -2.5s;
        }

        .float-card-3 {
            top: 45%;
            right: 8%;
            animation-delay: -1.2s;
        }

        .float-card-inner {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .fc-icon {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .fc-icon-green {
            background: rgba(16, 185, 129, .15);
        }

        .fc-icon-indigo {
            background: rgba(99, 102, 241, .15);
        }

        .fc-icon-amber {
            background: rgba(245, 158, 11, .15);
        }

        .fc-label {
            font-size: 12px;
            font-weight: 700;
            color: #111827;
        }

        .fc-sub {
            font-size: 11px;
            color: #4B5563;
            margin-top: 2px;
        }

        .progress-bar {
            height: 6px;
            width: 120px;
            background: rgba(0, 0, 0, .08);
            border-radius: 99px;
            overflow: hidden;
            margin-top: 8px;
        }

        .progress-fill {
            height: 100%;
            border-radius: 99px;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0)
            }

            50% {
                transform: translateY(-14px)
            }
        }

        /* ─── Stats ─── */
        .stats {
            padding: 48px 0;
            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 0;
        }

        .stat-item {
            text-align: center;
            padding: 24px;
            border-right: 1px solid var(--border);
        }

        .stat-item:last-child {
            border-right: none;
        }

        .stat-num {
            font-family: 'Outfit', sans-serif;
            font-size: 2.6rem;
            font-weight: 900;
            background: linear-gradient(135deg, #fff 0%, #A5B4FC 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stat-label {
            font-size: 13px;
            color: #6B7280;
            margin-top: 4px;
        }

        /* ─── Features ─── */
        .section {
            padding: 96px 0;
        }

        .section-label {
            font-size: 12px;
            font-weight: 700;
            color: #818CF8;
            letter-spacing: .1em;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        .section-title {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            line-height: 1.15;
            margin-bottom: 16px;
            letter-spacing: -.02em;
        }

        .section-sub {
            font-size: 17px;
            color: #4B5563;
            max-width: 560px;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-top: 56px;
        }

        .feat-card {
            border-radius: 20px;
            padding: 32px;
            transition: transform .3s, box-shadow .3s;
            position: relative;
            overflow: hidden;
        }

        .feat-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 24px 48px rgba(0, 0, 0, .35);
        }

        .feat-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 24px;
        }

        .feat-card h3 {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .feat-card p {
            font-size: 14px;
            color: #4B5563;
            line-height: 1.7;
        }

        .feat-card .feat-shine {
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 50% 0%, rgba(0, 0, 0, .04) 0%, transparent 60%);
            pointer-events: none;
        }

        /* ─── How it works ─── */
        .how-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: center;
            margin-top: 48px;
        }

        .step-list {
            display: flex;
            flex-direction: column;
            gap: 0;
        }

        .step {
            display: flex;
            gap: 20px;
            padding: 24px 0;
            border-bottom: 1px solid var(--border);
            cursor: pointer;
            transition: all .2s;
        }

        .step:last-child {
            border-bottom: none;
        }

        .step.active .step-num {
            background: linear-gradient(135deg, #4F7CFF, #7C3AED);
            color: #111827;
            box-shadow: 0 4px 16px rgba(79, 124, 255, .4);
        }

        .step.active h4 {
            color: #111827;
        }

        .step-num {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: rgba(0, 0, 0, .06);
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            font-weight: 800;
            color: #6B7280;
            flex-shrink: 0;
            transition: all .2s;
            font-family: 'Outfit', sans-serif;
        }

        .step-content h4 {
            font-size: 16px;
            font-weight: 700;
            color: #4B5563;
            margin-bottom: 6px;
            transition: color .2s;
        }

        .step-content p {
            font-size: 14px;
            color: #6B7280;
            line-height: 1.65;
        }

        .how-visual {
            border-radius: 24px;
            overflow: hidden;
            position: relative;
        }

        .how-visual-inner {
            border: 1px solid var(--border);
            border-radius: 22px;
            padding: 32px;
            min-height: 360px;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        /* ─── Testimonials ─── */
        .testimonials {
            padding: 96px 0;
            background: linear-gradient(180deg, transparent, rgba(79, 70, 229, .04), transparent);
        }

        .testi-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-top: 56px;
        }

        .testi-card {
            border-radius: 20px;
            padding: 32px;
            transition: transform .3s;
        }

        .testi-card:hover {
            transform: translateY(-4px);
        }

        .stars {
            display: flex;
            gap: 3px;
            margin-bottom: 20px;
        }

        .star {
            color: #FBBF24;
            font-size: 14px;
        }

        .testi-text {
            font-size: 15px;
            color: #4B5563;
            line-height: 1.75;
            margin-bottom: 24px;
        }

        .testi-author {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 16px;
            font-family: 'Outfit', sans-serif;
            flex-shrink: 0;
        }

        .author-name {
            font-size: 14px;
            font-weight: 600;
            color: #111827;
        }

        .author-role {
            font-size: 12px;
            color: #6B7280;
            margin-top: 2px;
        }

        .testi-featured {
            grid-column: span 2;
        }

        /* ─── Integrations ─── */
        .integrations {
            padding: 80px 0;
            border-top: 1px solid var(--border);
        }

        .integrations-title {
            text-align: center;
            font-size: 14px;
            color: #6B7280;
            margin-bottom: 40px;
            font-weight: 500;
        }

        .logos-track {
            display: flex;
            gap: 48px;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
        }

        .logo-item {
            display: flex;
            align-items: center;
            gap: 8px;
            opacity: .4;
            transition: opacity .2s;
            filter: grayscale(1);
        }

        .logo-item:hover {
            opacity: .75;
        }

        .logo-item span {
            font-size: 15px;
            font-weight: 700;
            color: #111827;
            letter-spacing: -.01em;
        }

        .logo-box {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }


        /* ─── FAQ ─── */
        .faq {
            padding: 96px 0;
            border-top: 1px solid var(--border);
        }

        .faq-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-top: 56px;
        }

        .faq-item {
            border-radius: 16px;
            overflow: hidden;
        }

        .faq-q {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 22px 24px;
            cursor: pointer;
            font-weight: 600;
            font-size: 15px;
            color: #374151;
            gap: 16px;
        }

        .faq-a {
            font-size: 14px;
            color: #4B5563;
            line-height: 1.7;
            padding: 0 24px 22px;
            display: none;
        }

        .faq-item.open .faq-a {
            display: block;
        }

        .faq-icon {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: rgba(0, 0, 0, .06);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: transform .2s;
        }

        .faq-item.open .faq-icon {
            transform: rotate(45deg);
            background: rgba(99, 102, 241, .25);
        }

        /* ─── CTA Banner ─── */
        .cta-banner {
            padding: 96px 0;
            position: relative;
            overflow: hidden;
        }

        .cta-banner-bg {
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse at 50% 100%, rgba(79, 70, 229, .2) 0%, transparent 65%);
            pointer-events: none;
        }

        .cta-inner {
            border-radius: 28px;
            padding: 64px;
            text-align: center;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(99, 102, 241, .25);
            background: linear-gradient(135deg, rgba(79, 124, 255, .07), rgba(124, 58, 237, .05));
        }

        .cta-inner::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 50% 0%, rgba(99, 102, 241, .12) 0%, transparent 60%);
            pointer-events: none;
        }

        .cta-inner h2 {
            font-size: clamp(2rem, 4vw, 3.5rem);
            font-weight: 900;
            margin-bottom: 16px;
            letter-spacing: -.02em;
        }

        .cta-inner p {
            font-size: 18px;
            color: #4B5563;
            margin-bottom: 40px;
        }

        .cta-actions {
            display: flex;
            justify-content: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        .btn-cta {
            padding: 16px 36px;
            border-radius: 999px;
            font-size: 16px;
            font-weight: 700;
            text-decoration: none;
            transition: all .25s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-cta-primary {
            color: #fff;
            background: linear-gradient(135deg, #4F7CFF, #7C3AED);
            box-shadow: 0 8px 32px rgba(79, 124, 255, .35);
        }

        .btn-cta-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 40px rgba(79, 124, 255, .5);
        }

        .btn-cta-secondary {
            color: #4B5563;
            background: rgba(0, 0, 0, .07);
            border: 1px solid rgba(0, 0, 0, .15);
        }

        .btn-cta-secondary:hover {
            background: rgba(0, 0, 0, .12);
        }

        .cta-note {
            font-size: 12px;
            color: #6B7280;
            margin-top: 20px;
        }

        /* ─── Footer ─── */
        footer {
            border-top: 1px solid var(--border);
            padding: 64px 0 40px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 48px;
            margin-bottom: 48px;
        }

        .footer-brand p {
            font-size: 14px;
            color: #6B7280;
            line-height: 1.7;
            margin-top: 16px;
            max-width: 280px;
        }

        .footer-col h5 {
            font-size: 13px;
            font-weight: 700;
            color: #4B5563;
            text-transform: uppercase;
            letter-spacing: .08em;
            margin-bottom: 20px;
        }

        .footer-col ul {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .footer-col a {
            font-size: 14px;
            color: #6B7280;
            text-decoration: none;
            transition: color .2s;
        }

        .footer-col a:hover {
            color: #111827;
        }

        .footer-bottom {
            padding-top: 32px;
            border-top: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
        }

        .footer-bottom p {
            font-size: 13px;
            color: #4B5563;
        }

        .footer-social {
            display: flex;
            gap: 16px;
        }

        .social-link {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: rgba(0, 0, 0, .05);
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all .2s;
            text-decoration: none;
        }

        .social-link:hover {
            background: rgba(0, 0, 0, .1);
            border-color: rgba(0, 0, 0, .2);
        }

        /* ─── SVG icons ─── */
        svg {
            display: inline-block;
        }

        /* ─── Responsive ─── */
        @media (max-width: 900px) {

            .features-grid,
            .testi-grid {
                grid-template-columns: 1fr;
            }

            .testi-featured {
                grid-column: span 1;
            }

            .how-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .faq-grid {
                grid-template-columns: 1fr;
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }

            .stat-item {
                border-right: none;
                border-bottom: 1px solid var(--border);
            }

            nav .nav-links,
            nav .btn-ghost {
                display: none;
            }
        }

        /* ─── Scroll reveal ─── */
        .reveal {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity .65s ease, transform .65s ease;
        }

        .reveal.visible {
            opacity: 1;
            transform: none;
        }

        .reveal-delay-1 {
            transition-delay: .1s;
        }

        .reveal-delay-2 {
            transition-delay: .2s;
        }

        .reveal-delay-3 {
            transition-delay: .3s;
        }
    </style>
</head>

<body>

    <!-- ─── Nav ─── -->
    <nav id="navbar">
        <div class="container">
            <div class="nav-inner">
                <a href="#" class="logo">
                    <div class="logo-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                        </svg>
                    </div>
                    <span class="logo-text">ClientFlow</span>
                </a>
                <ul class="nav-links">
                    <li><a href="#features">Features</a></li>
                    <li><a href="#how">How it works</a></li>
                    <li><a href="#testimonials">Testimonials</a></li>
                </ul>
                <div class="nav-cta">
                    <a href="#" class="btn-ghost">Log in</a>
                    <a href="#" class="btn-primary">Get Started Free</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- ─── Hero ─── -->
    <section class="hero">
        <div class="hero-glow"></div>
        <div class="hero-blob hero-blob-1"></div>
        <div class="hero-blob hero-blob-2"></div>
        <div class="container" style="position:relative;z-index:1">
            <div class="badge">
                <div class="badge-dot">
                    <span class="ping"></span>
                    <span></span>
                </div>
                <span class="badge-text">ClientFlow Pro 2.0 is live</span>
            </div>
            <h1>Manage agencies with<br><span class="gradient-text">effortless precision.</span></h1>
            <p>The all-in-one platform to track projects, collaborate with your team, and invoice clients without the
                usual friction. Built for modern digital teams.</p>
            <div class="hero-actions">
                <a href="#" class="btn-hero btn-hero-primary">
                    Get Started Free
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5">
                        <path d="M5 12h14M12 5l7 7-7 7" />
                    </svg>
                </a>
                <a href="#how" class="btn-hero btn-hero-secondary">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M10 8l6 4-6 4V8z" fill="currentColor" />
                    </svg>
                    See how it works
                </a>
            </div>

            <!-- Mockup -->
            <div class="mockup-wrap">
                <div class="mockup-outer">
                    <div class="mockup-inner glass">
                        <div class="mockup-bar">
                            <div class="dot dot-r"></div>
                            <div class="dot dot-y"></div>
                            <div class="dot dot-g"></div>
                            <div class="mockup-url">app.clientflow.com/dashboard</div>
                        </div>
                        <div class="mockup-body">
                            <img src="https://illustrations.popsy.co/amber/freelancer.svg" alt="Dashboard">
                            <!-- Floating cards -->
                            <div class="float-card float-card-1 glass">
                                <div class="float-card-inner">
                                    <div class="fc-icon fc-icon-green">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#10B981"
                                            stroke-width="2.5">
                                            <path d="M20 12V22H4V12" />
                                            <path d="M22 7H2v5h20V7z" />
                                            <path
                                                d="M12 22V7M12 7H7.5a2.5 2.5 0 010-5C11 2 12 7 12 7zM12 7h4.5a2.5 2.5 0 000-5C13 2 12 7 12 7z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="fc-label">Invoice Paid</div>
                                        <div class="fc-sub">$4,200 from Acme Corp</div>
                                    </div>
                                </div>
                            </div>
                            <div class="float-card float-card-2 glass">
                                <div class="fc-label" style="margin-bottom:8px">Sprint Progress</div>
                                <div class="progress-bar">
                                    <div class="progress-fill"
                                        style="width:75%;background:linear-gradient(90deg,#4F7CFF,#7C3AED)"></div>
                                </div>
                                <div class="fc-sub" style="margin-top:6px;color:#818CF8">75% complete · 3 days left
                                </div>
                            </div>
                            <div class="float-card float-card-3 glass">
                                <div class="float-card-inner">
                                    <div class="fc-icon fc-icon-amber">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#F59E0B"
                                            stroke-width="2.5">
                                            <path
                                                d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2M9 11a4 4 0 100-8 4 4 0 000 8zM23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="fc-label">12 Clients Active</div>
                                        <div class="fc-sub">+3 this month</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ─── Stats ─── -->
    <div class="stats">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item reveal">
                    <div class="stat-num">12k+</div>
                    <div class="stat-label">Active agencies</div>
                </div>
                <div class="stat-item reveal reveal-delay-1">
                    <div class="stat-num">$320M</div>
                    <div class="stat-label">Invoiced through platform</div>
                </div>
                <div class="stat-item reveal reveal-delay-2">
                    <div class="stat-num">4.9★</div>
                    <div class="stat-label">Average rating</div>
                </div>
                <div class="stat-item reveal reveal-delay-3">
                    <div class="stat-num">99.9%</div>
                    <div class="stat-label">Uptime SLA</div>
                </div>
            </div>
        </div>
    </div>

    <!-- ─── Features ─── -->
    <section class="section" id="features">
        <div class="container">
            <div class="reveal" style="text-align:center;max-width:600px;margin:0 auto">
                <div class="section-label">Features</div>
                <h2 class="section-title">Everything your agency needs, nothing it doesn't.</h2>
                <p class="section-sub" style="margin:0 auto">Replace your fragmented tool stack with a single, elegant
                    platform designed for client-facing teams.</p>
            </div>

            <div class="features-grid">
                <!-- 1 -->
                <div class="feat-card glass reveal reveal-delay-1">
                    <div class="feat-shine"></div>
                    <div class="feat-icon" style="background:rgba(79,124,255,.1);border:1px solid rgba(79,124,255,.2)">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#818CF8" stroke-width="2">
                            <rect x="3" y="3" width="7" height="7" rx="1" />
                            <rect x="14" y="3" width="7" height="7" rx="1" />
                            <rect x="3" y="14" width="7" height="7" rx="1" />
                            <rect x="14" y="14" width="7" height="7" rx="1" />
                        </svg>
                    </div>
                    <h3>Project Management</h3>
                    <p>Organize tasks with Kanban boards, Gantt charts, and detailed progress tracking. Assign,
                        prioritize, and never miss a deadline.</p>
                </div>
                <!-- 2 -->
                <div class="feat-card glass reveal reveal-delay-2">
                    <div class="feat-shine"></div>
                    <div class="feat-icon" style="background:rgba(139,92,246,.1);border:1px solid rgba(139,92,246,.2)">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#A78BFA" stroke-width="2">
                            <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75" />
                        </svg>
                    </div>
                    <h3>Client CRM</h3>
                    <p>Centralized client database that auto-syncs with ongoing projects, invoices, and communication
                        history.</p>
                </div>
                <!-- 3 -->
                <div class="feat-card glass reveal reveal-delay-3">
                    <div class="feat-shine"></div>
                    <div class="feat-icon" style="background:rgba(16,185,129,.1);border:1px solid rgba(16,185,129,.2)">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#34D399" stroke-width="2">
                            <rect x="1" y="4" width="22" height="16" rx="2" />
                            <path d="M1 10h22" />
                        </svg>
                    </div>
                    <h3>Invoicing & Payments</h3>
                    <p>Generate beautiful PDF invoices from project milestones. Accept Stripe payments and track
                        statuses in real-time.</p>
                </div>
                <!-- 4 -->
                <div class="feat-card glass reveal">
                    <div class="feat-shine"></div>
                    <div class="feat-icon" style="background:rgba(245,158,11,.1);border:1px solid rgba(245,158,11,.2)">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#FCD34D" stroke-width="2">
                            <polyline points="22 12 18 12 15 21 9 3 6 12 2 12" />
                        </svg>
                    </div>
                    <h3>Time Tracking</h3>
                    <p>Built-in time tracker per task and project. Export detailed timesheets and auto-generate
                        time-based invoices.</p>
                </div>
                <!-- 5 -->
                <div class="feat-card glass reveal reveal-delay-1">
                    <div class="feat-shine"></div>
                    <div class="feat-icon" style="background:rgba(236,72,153,.1);border:1px solid rgba(236,72,153,.2)">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#F472B6" stroke-width="2">
                            <path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z" />
                        </svg>
                    </div>
                    <h3>Client Portal</h3>
                    <p>Share a branded portal where clients track progress, approve deliverables, and pay invoices—no
                        account needed.</p>
                </div>
                <!-- 6 -->
                <div class="feat-card glass reveal reveal-delay-2">
                    <div class="feat-shine"></div>
                    <div class="feat-icon" style="background:rgba(6,182,212,.1);border:1px solid rgba(6,182,212,.2)">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#22D3EE" stroke-width="2">
                            <path d="M18 20V10M12 20V4M6 20v-6" />
                        </svg>
                    </div>
                    <h3>Analytics & Reports</h3>
                    <p>Revenue trends, project profitability, and team utilization at a glance. Make smarter decisions
                        with real data.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ─── How it works ─── -->
    <section class="section" id="how"
        style="background:linear-gradient(180deg,transparent,rgba(79,70,229,.03),transparent);border-top:1px solid var(--border)">
        <div class="container">
            <div class="reveal" style="text-align:center;max-width:560px;margin:0 auto 0">
                <div class="section-label">How it works</div>
                <h2 class="section-title">Up and running in minutes.</h2>
            </div>
            <div class="how-grid">
                <div class="step-list reveal">
                    <div class="step active" onclick="activateStep(this,0)">
                        <div class="step-num">1</div>
                        <div class="step-content">
                            <h4>Connect your clients</h4>
                            <p>Import contacts from CSV or connect your existing tools. ClientFlow syncs everything
                                automatically.</p>
                        </div>
                    </div>
                    <div class="step" onclick="activateStep(this,1)">
                        <div class="step-num">2</div>
                        <div class="step-content">
                            <h4>Create your first project</h4>
                            <p>Choose a template or start blank. Add tasks, milestones, and assign team members in
                                seconds.</p>
                        </div>
                    </div>
                    <div class="step" onclick="activateStep(this,2)">
                        <div class="step-num">3</div>
                        <div class="step-content">
                            <h4>Track work & time</h4>
                            <p>Your team logs time right inside tasks. Watch progress bars fill as work gets done.</p>
                        </div>
                    </div>
                    <div class="step" onclick="activateStep(this,3)">
                        <div class="step-num">4</div>
                        <div class="step-content">
                            <h4>Invoice and get paid</h4>
                            <p>Generate polished invoices from logged time in one click. Clients pay online via Stripe
                                or bank transfer.</p>
                        </div>
                    </div>
                </div>
                <div class="how-visual reveal reveal-delay-2">
                    <div class="how-visual-inner glass" id="how-visual">
                        <!-- Step 0 content shown by default -->
                        <div style="display:flex;align-items:center;gap:12px;margin-bottom:8px">
                            <div style="width:10px;height:10px;border-radius:50%;background:#10B981"></div>
                            <span style="font-size:13px;color:#6B7280">clients.csv imported successfully</span>
                        </div>
                        <div style="display:flex;flex-direction:column;gap:10px;margin-top:8px">
                            <div class="glass"
                                style="border-radius:12px;padding:14px 18px;display:flex;align-items:center;gap:14px">
                                <div
                                    style="width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,#4F7CFF,#7C3AED);display:flex;align-items:center;justify-content:center;font-weight:700;font-size:14px;font-family:'Outfit',sans-serif;flex-shrink:0;color:#fff;">
                                    A</div>
                                <div>
                                    <div style="font-size:14px;font-weight:600;color:#111827">Acme Corp</div>
                                    <div style="font-size:12px;color:#6B7280">3 active projects · $18,400 billed</div>
                                </div>
                                <div
                                    style="margin-left:auto;padding:4px 10px;border-radius:999px;background:rgba(16,185,129,.1);border:1px solid rgba(16,185,129,.2);font-size:11px;color:#059669">
                                    Active</div>
                            </div>
                            <div class="glass"
                                style="border-radius:12px;padding:14px 18px;display:flex;align-items:center;gap:14px">
                                <div
                                    style="width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,#F59E0B,#EF4444);display:flex;align-items:center;justify-content:center;font-weight:700;font-size:14px;font-family:'Outfit',sans-serif;flex-shrink:0;color:#fff;">
                                    N</div>
                                <div>
                                    <div style="font-size:14px;font-weight:600;color:#111827">NovaTech</div>
                                    <div style="font-size:12px;color:#6B7280">1 active project · $6,000 billed</div>
                                </div>
                                <div
                                    style="margin-left:auto;padding:4px 10px;border-radius:999px;background:rgba(16,185,129,.1);border:1px solid rgba(16,185,129,.2);font-size:11px;color:#059669">
                                    Active</div>
                            </div>
                            <div class="glass"
                                style="border-radius:12px;padding:14px 18px;display:flex;align-items:center;gap:14px">
                                <div
                                    style="width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,#10B981,#059669);display:flex;align-items:center;justify-content:center;font-weight:700;font-size:14px;font-family:'Outfit',sans-serif;flex-shrink:0;color:#fff;">
                                    S</div>
                                <div>
                                    <div style="font-size:14px;font-weight:600;color:#111827">Stardust LLC</div>
                                    <div style="font-size:12px;color:#6B7280">2 active projects · $9,800 billed</div>
                                </div>
                                <div
                                    style="margin-left:auto;padding:4px 10px;border-radius:999px;background:rgba(245,158,11,.1);border:1px solid rgba(245,158,11,.2);font-size:11px;color:#D97706">
                                    Onboarding</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ─── Integrations ─── -->
    <div class="integrations">
        <div class="container">
            <p class="integrations-title">Connects with the tools you already love</p>
            <div class="logos-track">
                <div class="logo-item">
                    <div class="logo-box" style="background:#4285F4">G</div><span>Google</span>
                </div>
                <div class="logo-item">
                    <div class="logo-box" style="background:#635BFF">S</div><span>Stripe</span>
                </div>
                <div class="logo-item">
                    <div class="logo-box" style="background:#1DB954">S</div><span>Slack</span>
                </div>
                <div class="logo-item">
                    <div class="logo-box" style="background:#0052CC">J</div><span>Jira</span>
                </div>
                <div class="logo-item">
                    <div class="logo-box" style="background:#000">N</div><span>Notion</span>
                </div>
                <div class="logo-item">
                    <div class="logo-box" style="background:#7C3AED">Z</div><span>Zapier</span>
                </div>
                <div class="logo-item">
                    <div class="logo-box" style="background:#2684FF">C</div><span>Confluence</span>
                </div>
                <div class="logo-item">
                    <div class="logo-box" style="background:#00B0FF">F</div><span>Figma</span>
                </div>
            </div>
        </div>
    </div>

    <!-- ─── Testimonials ─── -->
    <section class="testimonials" id="testimonials">
        <div class="container">
            <div class="reveal" style="text-align:center;max-width:560px;margin:0 auto">
                <div class="section-label">Testimonials</div>
                <h2 class="section-title">Loved by 12,000+ agencies worldwide.</h2>
            </div>
            <div class="testi-grid">
                <!-- Featured -->
                <div class="testi-card testi-featured glass reveal">
                    <div class="stars">★★★★★</div>
                    <p class="testi-text" style="font-size:18px;color:#E5E7EB">"ClientFlow completely transformed how we
                        run our studio. We cut admin time by 60% in the first month — time we now spend actually
                        delivering great work. I don't know how we survived without it."</p>
                    <div class="testi-author">
                        <div class="avatar" style="background:linear-gradient(135deg,#4F7CFF,#7C3AED)">S</div>
                        <div>
                            <div class="author-name">Sarah Chen</div>
                            <div class="author-role">Founder, Pixel Studio · 23-person agency</div>
                        </div>
                    </div>
                </div>
                <!-- Regular -->
                <div class="testi-card glass reveal reveal-delay-1">
                    <div class="stars">★★★★★</div>
                    <p class="testi-text">"The invoicing alone was worth switching. My clients get beautiful invoices, I
                        get paid faster. Simple as that."</p>
                    <div class="testi-author">
                        <div class="avatar" style="background:linear-gradient(135deg,#F59E0B,#EF4444)">M</div>
                        <div>
                            <div class="author-name">Marcus Webb</div>
                            <div class="author-role">Freelance developer</div>
                        </div>
                    </div>
                </div>
                <div class="testi-card glass reveal reveal-delay-2">
                    <div class="stars">★★★★★</div>
                    <p class="testi-text">"Our clients love the portal. They always know where their project stands
                        without having to ping us every day."</p>
                    <div class="testi-author">
                        <div class="avatar" style="background:linear-gradient(135deg,#10B981,#059669)">A</div>
                        <div>
                            <div class="author-name">Aisha Patel</div>
                            <div class="author-role">Creative Director, Launchpad Agency</div>
                        </div>
                    </div>
                </div>
                <div class="testi-card glass reveal">
                    <div class="stars">★★★★★</div>
                    <p class="testi-text">"Switched from a messy combo of Notion + spreadsheets + FreshBooks. ClientFlow
                        does it all, better. The team was onboarded in under an hour."</p>
                    <div class="testi-author">
                        <div class="avatar" style="background:linear-gradient(135deg,#EC4899,#8B5CF6)">J</div>
                        <div>
                            <div class="author-name">James Kowalski</div>
                            <div class="author-role">CEO, Forge Digital</div>
                        </div>
                    </div>
                </div>
                <div class="testi-card glass reveal reveal-delay-1">
                    <div class="stars">★★★★☆</div>
                    <p class="testi-text">"Time tracking used to be a pain point for our whole team. Now it's
                        effortless, and billing disputes have basically dropped to zero."</p>
                    <div class="testi-author">
                        <div class="avatar" style="background:linear-gradient(135deg,#06B6D4,#3B82F6)">L</div>
                        <div>
                            <div class="author-name">Lisa Hoffman</div>
                            <div class="author-role">Operations Lead, Brightly</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- ─── FAQ ─── -->
    <section class="faq">
        <div class="container">
            <div class="reveal" style="text-align:center;max-width:560px;margin:0 auto">
                <div class="section-label">FAQ</div>
                <h2 class="section-title">Questions, answered.</h2>
            </div>
            <div class="faq-grid">
                <div class="faq-item glass reveal" onclick="toggleFaq(this)">
                    <div class="faq-q">
                        Is ClientFlow really free?
                        <div class="faq-icon"><svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <path d="M6 2v8M2 6h8" />
                            </svg></div>
                    </div>
                    <div class="faq-a">Yes — ClientFlow is a completely free platform. You get access to all features
                        without any credit card required or hidden costs.</div>
                </div>
                <div class="faq-item glass reveal reveal-delay-1" onclick="toggleFaq(this)">
                    <div class="faq-q">
                        How does the client portal work?
                        <div class="faq-icon"><svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <path d="M6 2v8M2 6h8" />
                            </svg></div>
                    </div>
                    <div class="faq-a">Each client gets a unique link to their own portal where they can view project
                        progress, leave feedback, approve deliverables, and pay invoices — no account needed on their
                        end.</div>
                </div>
                <div class="faq-item glass reveal reveal-delay-2" onclick="toggleFaq(this)">
                    <div class="faq-q">
                        Can I import data from other tools?
                        <div class="faq-icon"><svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <path d="M6 2v8M2 6h8" />
                            </svg></div>
                    </div>
                    <div class="faq-a">Absolutely. ClientFlow supports CSV imports for clients and projects, and has
                        native integrations with Notion, Jira, and Google Workspace.</div>
                </div>
                <div class="faq-item glass reveal reveal-delay-3" onclick="toggleFaq(this)">
                    <div class="faq-q">
                        What payment methods does invoicing support?
                        <div class="faq-icon"><svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <path d="M6 2v8M2 6h8" />
                            </svg></div>
                    </div>
                    <div class="faq-a">Clients can pay via credit card, debit card, ACH bank transfer, and PayPal — all
                        powered by Stripe. You can also mark invoices as paid manually for wire transfers.</div>
                </div>
                <div class="faq-item glass reveal" onclick="toggleFaq(this)">
                    <div class="faq-q">
                        Is my data secure?
                        <div class="faq-icon"><svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <path d="M6 2v8M2 6h8" />
                            </svg></div>
                    </div>
                    <div class="faq-a">Yes. ClientFlow is SOC 2 Type II certified, uses AES-256 encryption at rest, TLS
                        1.3 in transit, and is fully GDPR compliant. Your data is never sold or shared.</div>
                </div>

            </div>
        </div>
    </section>

    <!-- ─── CTA Banner ─── -->
    <div class="cta-banner">
        <div class="cta-banner-bg"></div>
        <div class="container">
            <div class="cta-inner reveal">
                <h2>Ready to scale your agency?</h2>
                <p>Join 12,000+ freelancers and agencies who moved to ClientFlow to reclaim their time and sanity.</p>
                <div class="cta-actions">
                    <a href="#" class="btn-cta btn-cta-primary">
                        Get Started Free
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5">
                            <path d="M5 12h14M12 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- ─── Footer ─── -->
    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <a href="#" class="logo">
                        <div class="logo-icon" style="width:36px;height:36px;border-radius:10px">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5">
                                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                            </svg>
                        </div>
                        <span class="logo-text" style="font-size:17px">ClientFlow</span>
                    </a>
                    <p>The all-in-one project and client management platform built for modern digital agencies and
                        freelancers.</p>
                </div>
                <div class="footer-col">
                    <h5>Product</h5>
                    <ul>
                        <li><a href="#">Features</a></li>
                        <li><a href="#">Changelog</a></li>
                        <li><a href="#">Roadmap</a></li>
                        <li><a href="#">Status</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h5>Company</h5>
                    <ul>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Press</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h5>Legal</h5>
                    <ul>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Cookie Policy</a></li>
                        <li><a href="#">DPA</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© 2026 ClientFlow Inc. All rights reserved.</p>
                <div class="footer-social">
                    <a href="#" class="social-link" title="Twitter">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="#9CA3AF">
                            <path
                                d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.746l7.73-8.835L1.254 2.25H8.08l4.253 5.622zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                        </svg>
                    </a>
                    <a href="#" class="social-link" title="GitHub">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="#9CA3AF">
                            <path
                                d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" />
                        </svg>
                    </a>
                    <a href="#" class="social-link" title="LinkedIn">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="#9CA3AF">
                            <path
                                d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Navbar scroll
        window.addEventListener('scroll', () => {
            document.getElementById('navbar').classList.toggle('scrolled', window.scrollY > 20);
        });

        // Scroll reveal
        const revealEls = document.querySelectorAll('.reveal');
        const observer = new IntersectionObserver(entries => {
            entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); } });
        }, { threshold: 0.12 });
        revealEls.forEach(el => observer.observe(el));

        // FAQ toggle
        function toggleFaq(el) {
            el.classList.toggle('open');
        }

        // How it works steps
        const stepVisuals = [
            // Step 0: clients
            `<div style="display:flex;align-items:center;gap:12px;margin-bottom:16px"><div style="width:10px;height:10px;border-radius:50%;background:#10B981"></div><span style="font-size:13px;color:#6B7280">clients.csv imported successfully</span></div><div style="display:flex;flex-direction:column;gap:10px"><div class="glass" style="border-radius:12px;padding:14px 18px;display:flex;align-items:center;gap:14px"><div style="width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,#4F7CFF,#7C3AED);display:flex;align-items:center;justify-content:center;font-weight:700;font-size:14px;font-family:'Outfit',sans-serif;flex-shrink:0;color:#fff;">A</div><div><div style="font-size:14px;font-weight:600;color:#111827">Acme Corp</div><div style="font-size:12px;color:#6B7280">3 active projects · $18,400 billed</div></div><div style="margin-left:auto;padding:4px 10px;border-radius:999px;background:rgba(16,185,129,.1);border:1px solid rgba(16,185,129,.2);font-size:11px;color:#059669">Active</div></div><div class="glass" style="border-radius:12px;padding:14px 18px;display:flex;align-items:center;gap:14px"><div style="width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,#F59E0B,#EF4444);display:flex;align-items:center;justify-content:center;font-weight:700;font-size:14px;font-family:'Outfit',sans-serif;flex-shrink:0;color:#fff;">N</div><div><div style="font-size:14px;font-weight:600;color:#111827">NovaTech</div><div style="font-size:12px;color:#6B7280">1 project · $6,000 billed</div></div><div style="margin-left:auto;padding:4px 10px;border-radius:999px;background:rgba(16,185,129,.1);border:1px solid rgba(16,185,129,.2);font-size:11px;color:#059669">Active</div></div></div>`,
            // Step 1: project
            `<div style="margin-bottom:16px"><div style="font-size:11px;color:#818CF8;text-transform:uppercase;letter-spacing:.08em;font-weight:700;margin-bottom:10px">New Project</div><div style="font-size:20px;font-weight:800;font-family:'Outfit',sans-serif;color:#111827;margin-bottom:4px">Brand Redesign — Acme Corp</div><div style="font-size:13px;color:#6B7280">Due April 28, 2026 · Sarah, Marcus, 2 others</div></div><div style="display:flex;flex-direction:column;gap:8px"><div class="glass" style="border-radius:10px;padding:12px 16px;display:flex;align-items:center;gap:10px"><div style="width:8px;height:8px;border-radius:50%;background:#FBBF24;flex-shrink:0"></div><span style="font-size:13px;color:#111827;flex:1">Discovery & brand audit</span><span style="font-size:11px;color:#059669;font-weight:600">Done</span></div><div class="glass" style="border-radius:10px;padding:12px 16px;display:flex;align-items:center;gap:10px"><div style="width:8px;height:8px;border-radius:50%;background:#4F7CFF;flex-shrink:0"></div><span style="font-size:13px;color:#111827;flex:1">Moodboard & concepts</span><span style="font-size:11px;color:#4F7CFF;font-weight:600">In progress</span></div><div class="glass" style="border-radius:10px;padding:12px 16px;display:flex;align-items:center;gap:10px"><div style="width:8px;height:8px;border-radius:50%;background:#374151;flex-shrink:0"></div><span style="font-size:13px;color:#6B7280;flex:1">Final delivery</span><span style="font-size:11px;color:#6B7280;font-weight:600">Upcoming</span></div></div>`,
            // Step 2: time tracking
            `<div style="margin-bottom:16px"><div style="font-size:11px;color:#818CF8;text-transform:uppercase;letter-spacing:.08em;font-weight:700;margin-bottom:10px">Time this week</div></div><div style="display:flex;flex-direction:column;gap:10px"><div class="glass" style="border-radius:12px;padding:16px;display:flex;align-items:center;gap:14px"><div style="width:36px;height:36px;border-radius:10px;background:rgba(79,124,255,.15);display:flex;align-items:center;justify-content:center;font-weight:700;font-size:13px;font-family:'Outfit',sans-serif;color:#4F7CFF">S</div><div style="flex:1"><div style="font-size:14px;font-weight:600;color:#111827;margin-bottom:4px">Sarah Chen</div><div style="height:6px;background:rgba(0,0,0,.07);border-radius:99px;overflow:hidden"><div style="height:100%;width:82%;background:linear-gradient(90deg,#4F7CFF,#7C3AED);border-radius:99px"></div></div></div><div style="font-size:13px;font-weight:700;color:#4F7CFF;flex-shrink:0">32.5h</div></div><div class="glass" style="border-radius:12px;padding:16px;display:flex;align-items:center;gap:14px"><div style="width:36px;height:36px;border-radius:10px;background:rgba(245,158,11,.15);display:flex;align-items:center;justify-content:center;font-weight:700;font-size:13px;font-family:'Outfit',sans-serif;color:#D97706">M</div><div style="flex:1"><div style="font-size:14px;font-weight:600;color:#111827;margin-bottom:4px">Marcus Webb</div><div style="height:6px;background:rgba(0,0,0,.07);border-radius:99px;overflow:hidden"><div style="height:100%;width:58%;background:linear-gradient(90deg,#F59E0B,#EF4444);border-radius:99px"></div></div></div><div style="font-size:13px;font-weight:700;color:#D97706;flex-shrink:0">23h</div></div></div>`,
            // Step 3: invoice
            `<div class="glass" style="border-radius:16px;padding:24px"><div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:20px"><div><div style="font-size:18px;font-weight:800;font-family:'Outfit',sans-serif;color:#111827">Invoice #0042</div><div style="font-size:12px;color:#6B7280;margin-top:4px">Issued Apr 15, 2026 · Due Apr 30</div></div><div style="padding:6px 14px;border-radius:999px;background:rgba(245,158,11,.1);border:1px solid rgba(245,158,11,.2);font-size:12px;color:#D97706;font-weight:600">Awaiting payment</div></div><div style="display:flex;flex-direction:column;gap:8px;margin-bottom:20px;padding-bottom:20px;border-bottom:1px solid rgba(0,0,0,.07)"><div style="display:flex;justify-content:space-between;font-size:13px"><span style="color:#6B7280">Brand redesign (32.5h @ $95)</span><span style="color:#111827;font-weight:600">$3,087.50</span></div><div style="display:flex;justify-content:space-between;font-size:13px"><span style="color:#6B7280">Strategy sessions (4h @ $120)</span><span style="color:#111827;font-weight:600">$480.00</span></div></div><div style="display:flex;justify-content:space-between;font-size:16px;font-weight:800;font-family:'Outfit',sans-serif"><span style="color:#6B7280">Total due</span><span class="gradient-text">$3,567.50</span></div></div>`
        ];

        function activateStep(el, idx) {
            document.querySelectorAll('.step').forEach(s => s.classList.remove('active'));
            el.classList.add('active');
            const visual = document.getElementById('how-visual');
            visual.style.opacity = 0;
            visual.style.transform = 'translateY(8px)';
            setTimeout(() => {
                visual.innerHTML = stepVisuals[idx];
                visual.style.transition = 'opacity .3s, transform .3s';
                visual.style.opacity = 1;
                visual.style.transform = 'translateY(0)';
            }, 200);
        }
    </script>
</body>

</html>