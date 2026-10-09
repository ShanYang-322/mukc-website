<?php
/**
 * MUKC – Custom Front Page
 * Loaded via template_include filter (functions.php), so it works
 * regardless of WordPress Settings > Reading.
 *
 * Zero Ice Cold theme markup. All styles are self-contained.
 */

/* ---------- resolve assets ---------- */
$site_name = get_bloginfo('name');

// Logo: use the white badge in the 02 folder
$logo_url = content_url('uploads/2026/02/MUKC_badge.png');
$footer_logo = content_url('uploads/2026/02/On-white.png');

// Assets - Use 02 folder
$hero_bg = content_url('uploads/2026/02/IMG_4558.jpg');
// Fallback if original is missing
if (!$hero_bg) {
    $hero_bg = content_url('uploads/2026/02/IMG_4558-2000x1200.jpg');
}
$alex_img = content_url('uploads/2026/02/IMG_0822-scaled.jpg');
$sean_img = content_url('uploads/2026/02/IMG_0535.jpg');
$joachim_img = content_url('uploads/2026/02/DSC5400-scaled-1.jpg');
$jie_img = content_url('uploads/2026/02/FB_IMG_1740290134515.jpg');
$newsletter_url = 'https://melbunikarateclub.substack.com/p/d97cf8ff-63eb-4feb-99c8-83198eff9362?postPreview=paid&updated=2026-04-12T07%3A59%3A43.175Z&audience=everyone&free_preview=false&freemail=true&fbclid=IwY2xjawRUGu1leHRuA2FlbQIxMABicmlkETFJU2J1bGd4MnpSWkxUSGVnc3J0YwZhcHBfaWQQMjIyMDM5MTc4ODIwMDg5MgABHrE0lrYmtp9JqH2fmDbfGPOKADZYEc8qlkR-r26eUfLbsiG10j6HhXYYDnoV_aem_RcVhMG1AVru9CjS0rsWVsw';
$newsletter_image = 'https://substackcdn.com/image/fetch/$s_!Sv6P!,w_848,c_limit,f_auto,q_auto:good,fl_progressive:steep/https%3A%2F%2Fsubstack-post-media.s3.amazonaws.com%2Fpublic%2Fimages%2F72133efa-54d5-4e4e-aad3-aeb76f246a7e_2048x1365.jpeg';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo esc_html($site_name); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&display=swap"
        rel="stylesheet">
    <?php wp_head(); ?>
    <style>
        /* ================================================
   MUKC HOME PAGE — fully self-contained styles
   ================================================ */

        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html,
        body {
            width: 100%;
            min-height: 100vh;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        /* ── HERO WRAPPER ─────────────────────────────── */
        .mukc-hero {
            position: relative;
            width: 100%;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        /* Background photo */
        .mukc-hero__bg {
            position: absolute;
            inset: 0;
            background-image: url('<?php echo esc_url($hero_bg); ?>');
            background-size: cover;
            background-position: center 58%;
            background-repeat: no-repeat;
            /* slight darkening baked into the image layer */
            filter: brightness(0.70);
        }

        /* Gradient overlay for readability */
        .mukc-hero__overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to right,
                    rgba(0, 0, 0, 0.45) 0%,
                    rgba(0, 0, 0, 0.10) 70%,
                    rgba(0, 0, 0, 0.00) 100%);
        }

        /* ── NAV ──────────────────────────────────────── */
        .mukc-nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            display: flex;
            align-items: center;
            padding: 0 48px;
            height: 76px;
            background: rgba(0, 0, 0, 0);
            transition: background 0.3s ease, height 0.3s ease;
        }

        .mukc-nav.is-scrolled {
            background: rgba(8, 8, 8, 0.95);
            height: 66px;
            backdrop-filter: blur(8px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        /* Brand / logo */
        .mukc-nav__brand {
            display: flex;
            align-items: center;
            gap: 14px;
            text-decoration: none;
            flex-shrink: 0;
            transition: opacity 0.3s ease;
        }

        .mukc-nav__brand:hover {
            opacity: 0.85;
        }

        .mukc-nav__logo {
            width: 64px;
            height: 64px;
            object-fit: contain;
            border-radius: 50%;
        }

        .mukc-nav__brand-text {
            display: flex;
            flex-direction: column;
            line-height: 1.25;
        }

        .mukc-nav__name {
            font-size: 1.15rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            color: #ffffff;
            transition: all 0.4s ease;
        }

        .mukc-nav__brand:hover .mukc-nav__name {
            background: linear-gradient(135deg, #ffffff 0%, #bdc3c7 50%, #ffffff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-size: 200% auto;
            animation: silverShift 2s linear infinite;
        }

        @keyframes silverShift {
            to {
                background-position: 200% center;
            }
        }

        /* Nav links */
        .mukc-nav__menu {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 36px;
            list-style: none;
        }

        .mukc-nav__menu a {
            font-size: 0.85rem;
            font-weight: 400;
            color: rgba(255, 255, 255, 0.85);
            text-decoration: none;
            letter-spacing: 0.01em;
            transition: color 0.18s;
        }

        .mukc-nav__menu a:hover,
        .mukc-nav__menu .current-menu-item>a {
            color: #ffffff;
        }

        /* Hamburger (mobile) */
        .mukc-nav__burger {
            display: none;
            flex-direction: column;
            gap: 5px;
            margin-left: auto;
            background: none;
            border: none;
            cursor: pointer;
            padding: 6px;
        }

        .mukc-nav__burger span {
            display: block;
            width: 24px;
            height: 2px;
            background: #ffffff;
            border-radius: 2px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            transform-origin: center;
        }

        .mukc-nav__burger.is-active span:nth-child(1) {
            transform: translateY(7px) rotate(45deg);
        }

        .mukc-nav__burger.is-active span:nth-child(2) {
            opacity: 0;
            transform: translateX(-10px);
        }

        .mukc-nav__burger.is-active span:nth-child(3) {
            transform: translateY(-7px) rotate(-45deg);
        }

        /* ── HERO CONTENT ─────────────────────────────── */
        .mukc-hero__body {
            position: relative;
            z-index: 10;
            flex: 1;
            display: flex;
            align-items: flex-start;
            padding: 62vh 60px 80px;
            max-width: calc(1100px + 120px);
            margin: 0 auto;
            width: 100%;
        }

        /* Two-line quote */
        .mukc-quote {
            display: flex;
            flex-direction: column;
            gap: 8px;
            /* separation for impact */
        }

        .mukc-quote__line {
            font-size: clamp(1.4rem, 3.2vw, 2.6rem);
            font-weight: 500;
            font-style: normal;
            line-height: 1.2;
            color: #ffffff;
            letter-spacing: -0.01em;
            text-shadow: 0 4px 15px rgba(0, 0, 0, 0.45);
        }

        /* ── SCROLL INDICATOR ─────────────────────────── */
        .mukc-scroll {
            position: absolute;
            bottom: 28px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10;
            animation: mukc-bounce 2s ease-in-out infinite;
            opacity: 0.55;
        }

        .mukc-scroll svg {
            display: block;
            width: 22px;
            height: 22px;
            stroke: #ffffff;
            stroke-width: 2px;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        @keyframes mukc-bounce {

            0%,
            100% {
                transform: translateX(-50%) translateY(0);
            }

            50% {
                transform: translateX(-50%) translateY(9px);
            }
        }

        /* ── MOBILE ───────────────────────────────────── */
        @media (max-width: 768px) {
            .mukc-nav {
                padding: 0 18px;
            }

            .mukc-nav__brand {
                gap: 8px;
            }

            .mukc-nav__logo {
                width: 40px;
                height: 40px;
            }

            .mukc-nav__menu {
                display: none;
                position: fixed;
                inset: 0 0 0 auto;
                width: 250px;
                height: 100vh;
                background: rgba(8, 8, 8, 0.97);
                flex-direction: column;
                align-items: flex-start;
                gap: 0;
                padding: 80px 28px 28px;
                z-index: 200;
            }

            .mukc-nav__menu.is-open {
                display: flex;
            }

            .mukc-nav__menu li {
                width: 100%;
                border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            }

            .mukc-nav__menu a {
                display: block;
                padding: 14px 0;
                font-size: 1rem;
            }

            .mukc-nav__name {
                font-size: 0.85rem;
                /* Shorter for mobile to prevent squash */
            }

            .mukc-nav__burger {
                display: flex;
                z-index: 300;
                /* Above the menu */
            }

            .mukc-hero__body {
                padding: 0 24px 80px;
                align-items: flex-end;
                /* quote near bottom on mobile */
            }

            .mukc-quote__line {
                font-size: clamp(1rem, 5vw, 1.4rem);
            }
        }

        /* ================================================
           TRAINING TIMES SECTION
           ================================================ */
        .mukc-training {
            background: #e8e7e0;
            padding: 72px 60px;
        }

        .mukc-training__inner {
            max-width: 1100px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: start;
        }

        .mukc-training__left h2 {
            font-size: 2.2rem;
            font-weight: 800;
            color: #111111;
            margin-bottom: 28px;
            letter-spacing: -0.01em;
        }

        .mukc-training__schedule {
            margin-bottom: 20px;
        }

        .mukc-training__schedule p {
            font-size: 0.95rem;
            font-weight: 700;
            color: #111111;
            line-height: 1.7;
        }

        .mukc-training__schedule .note {
            font-weight: 400;
            color: #444444;
        }

        .mukc-training__venue {
            font-size: 0.95rem;
            color: #111111;
            line-height: 1.7;
        }

        .mukc-training__venue strong {
            font-weight: 700;
        }

        .mukc-training__venue .cta {
            font-size: 1.3rem;
            font-weight: 600;
            color: #111111;
            border-left: 4px solid #232d4b;
            padding-left: 20px;
            margin-top: 15px;
        }

        .mukc-map {
            width: 100%;
            aspect-ratio: 4 / 3;
            border: none;
            border-radius: 4px;
            display: block;
        }

        /* ================================================
           BEGINNER PROGRAM SECTION
           ================================================ */
        .mukc-beginners {
            background: #232d4b;
            padding: 96px 60px;
            color: #ffffff;
            position: relative;
            overflow: hidden;
        }

        .mukc-beginners__badge {
            display: inline-block;
            background: #ffffff;
            color: #232d4b;
            padding: 6px 14px;
            font-size: 0.75rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            border-radius: 20px;
            margin-bottom: 20px;
        }

        .mukc-beginners__inner {
            max-width: 1100px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: center;
        }

        .mukc-beginners__inner h2 {
            font-size: 2.2rem;
            font-weight: 800;
            margin-bottom: 24px;
            text-transform: none;
            letter-spacing: -0.01em;
            color: #ffffff;
        }

        .mukc-beginners__details {
            font-size: 0.95rem;
            line-height: 1.7;
            margin-bottom: 28px;
            color: rgba(255, 255, 255, 0.9);
        }

        .mukc-beginners__details strong {
            display: block;
            font-size: 0.95rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 4px;
        }

        .mukc-beginners__cta {
            font-size: 1.3rem;
            font-weight: 600;
            color: #ffffff;
            border-left: 4px solid #ffffff;
            padding-left: 20px;
        }

        @media (max-width: 900px) {
            .mukc-beginners {
                padding: 60px 24px;
            }

            .mukc-beginners__inner {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .mukc-beginners__inner h2 {
                font-size: 2rem;
            }

            .mukc-beginners__cta {
                font-size: 1.1rem;
            }
        }

        /* ================================================
           MEMBERSHIP FEES SECTION
           ================================================ */
        .mukc-fees {
            background: #ffffff;
            padding: 72px 60px;
        }

        .mukc-fees__inner {
            max-width: 1100px;
            margin: 0 auto;
        }

        .mukc-fees__inner h2 {
            font-size: 2.2rem;
            font-weight: 800;
            color: #111111;
            margin-bottom: 40px;
            letter-spacing: -0.01em;
        }

        .mukc-fees__list {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .mukc-fees__header {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 20px;
            padding: 0 20px 12px;
            border-bottom: 2px solid #e0e0e0;
            font-size: 0.85rem;
            font-weight: 700;
            color: #555555;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .mukc-fees__row {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 20px;
            padding: 24px 20px;
            border-bottom: 1px solid #f0f0f0;
            align-items: center;
            transition: background 0.2s ease;
        }

        .mukc-fees__row.mukc-row-alt {
            background: #fafafa;
        }

        .mukc-fees__row:hover {
            background: #f4f4f4;
        }

        .mukc-fees__type-text {
            font-size: 1.1rem;
            font-weight: 700;
            color: #111111;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .mukc-fees__type-text span {
            font-size: 0.8rem;
            font-weight: 400;
            color: #666666;
        }

        .mukc-fees__duration {
            font-size: 0.95rem;
            color: #333333;
            font-weight: 500;
        }

        .mukc-fees__cost {
            font-size: 1.4rem;
            font-weight: 800;
            color: #111111;
            text-align: right;
            font-feature-settings: "tnum";
            font-variant-numeric: tabular-nums;
        }

        .mukc-fees__cost span {
            font-size: 0.9rem;
            color: #666666;
            margin-right: 2px;
            vertical-align: super;
        }

        .mukc-fees__price-wrap {
            display: inline-flex;
            align-items: baseline;
            gap: 2px;
        }

        .mukc-fees__cost-note {
            display: block;
            font-size: 0.75rem;
            color: #666666;
            margin-top: 4px;
            font-weight: 400;
            text-transform: none;
            letter-spacing: normal;
            line-height: 1.4;
        }

        /* Responsive for new sections */
        @media (max-width: 768px) {

            .mukc-training,
            .mukc-fees {
                padding: 48px 24px;
            }

            .mukc-training__inner {
                grid-template-columns: 1fr;
                gap: 32px;
            }

            .mukc-fees__header {
                display: none;
            }

            .mukc-fees__row {
                grid-template-columns: 1fr;
                gap: 16px;
                padding: 24px 20px;
            }

            .mukc-fees__type-text {
                font-size: 1.2rem;
                margin-bottom: 4px;
            }

            .mukc-fees__cost {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                align-items: center;
                text-align: left;
                font-size: 1.2rem;
                margin-top: 0;
                padding-top: 12px;
                border-top: 1px solid rgba(0, 0, 0, 0.05);
            }

            .mukc-fees__cost::before {
                content: attr(data-label);
                font-size: 0.85rem;
                font-weight: 600;
                color: #666666;
                text-transform: uppercase;
                letter-spacing: 0.05em;
            }

            .mukc-fees__cost-note {
                width: 100%;
                font-size: 0.8rem;
                margin-top: 6px;
            }
        }

        /* ================================================
           WELCOME / BANK DETAILS ROW
           ================================================ */
        .mukc-welcome {
            max-width: 1100px;
            margin: 0 auto;
            padding: 48px 0 16px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px;
            align-items: start;
        }

        .mukc-welcome__text {
            grid-column: span 2;
            font-size: 0.9rem;
            color: #333333;
            line-height: 1.75;
        }

        .mukc-welcome__text strong {
            font-weight: 700;
            color: #111111;
        }

        .mukc-welcome__bank {
            font-size: 0.9rem;
            color: #333333;
            line-height: 1.75;
        }

        .mukc-fees__btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #111111;
            color: #ffffff;
            font-size: 0.95rem;
            font-weight: 600;
            padding: 14px 28px;
            text-decoration: none;
            border-radius: 4px;
            transition: background 0.2s ease;
            margin-top: 24px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .mukc-fees__btn:hover {
            background: #333333;
            color: #ffffff;
            cursor: pointer;
        }

        .mukc-welcome__cta {
            font-size: 1.3rem;
            font-weight: 600;
            color: #111111;
            border-left: 4px solid #232d4b;
            padding-left: 20px;
            margin-top: 16px;
        }

        .mukc-welcome__bank strong {
            display: block;
            font-weight: 700;
            color: #111111;
            margin-bottom: 4px;
        }
        
        /* ================================================
           ANNOUNCEMENTS SECTION
           ================================================ */
        .mukc-announcements {
            background: #111111;
            padding: 96px 60px;
            color: #ffffff;
        }

        .mukc-announcements__inner {
            max-width: 1300px;
            margin: 0 auto;
            text-align: left;
        }

        .mukc-announcements__header {
            margin-bottom: 40px;
            text-align: left;
        }

        .mukc-announcements__header h2 {
            font-size: clamp(2.2rem, 4vw, 3.4rem);
            font-weight: 700;
            margin-bottom: 20px;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            line-height: 1.1;
        }

        .mukc-announcements__header p {
            font-size: 0.95rem;
            line-height: 1.7;
            color: rgba(255, 255, 255, 0.7);
        }

        .mukc-announcements__list,
        .mukc-announcements__group {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .mukc-announcements__group[hidden] {
            display: none;
        }

        .mukc-announcements__columns,
        .mukc-announcement__row {
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(0, 1.8fr) 140px;
            gap: 32px;
        }

        .mukc-announcements__columns {
            padding: 0 24px 12px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: rgba(255, 255, 255, 0.5);
        }

        .mukc-announcements__columns span:last-child {
            text-align: right;
        }

        .mukc-announcement {
            background: rgba(255, 255, 255, 0.02);
            border-radius: 8px;
            transition: background 0.2s ease;
        }

        .mukc-announcement:nth-child(even) {
            background: rgba(255, 255, 255, 0.04);
        }

        .mukc-announcement:hover,
        .mukc-announcement:has(details[open]) {
            background: rgba(255, 255, 255, 0.07);
        }

        .mukc-announcement__row {
            align-items: center;
            padding: 24px;
            cursor: pointer;
            list-style: none;
            border-radius: 8px;
        }

        .mukc-announcement__row::-webkit-details-marker {
            display: none;
        }

        .mukc-announcement__row:focus-visible,
        .mukc-announcements__toggle:focus-visible {
            outline: 2px solid #ffffff;
            outline-offset: 4px;
        }

        .mukc-announcement h3 {
            font-size: 1.1rem;
            font-weight: 700;
            line-height: 1.4;
        }

        .mukc-announcement__hint {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            margin-top: 10px;
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.55);
        }

        .mukc-announcement__hint svg {
            width: 18px;
            height: 18px;
            fill: currentColor;
            transition: transform 0.2s ease;
        }

        .mukc-announcement__close,
        .mukc-announcement details[open] .mukc-announcement__read {
            display: none;
        }

        .mukc-announcement details[open] .mukc-announcement__close {
            display: inline;
        }

        .mukc-announcement details[open] .mukc-announcement__hint svg {
            transform: rotate(180deg);
        }

        .mukc-announcement__excerpt {
            font-size: 0.95rem;
            line-height: 1.6;
            color: rgba(255, 255, 255, 0.85);
        }

        .mukc-announcement__date {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-self: end;
            gap: 6px;
            text-align: center;
            font-variant-numeric: tabular-nums;
        }

        .mukc-announcement__day {
            display: block;
            font-size: 3.6rem;
            font-weight: 700;
            line-height: 1;
            letter-spacing: -0.04em;
        }

        .mukc-announcement__month {
            display: block;
            font-size: 0.8rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            line-height: 1.2;
            color: rgba(255, 255, 255, 0.6);
        }

        .mukc-announcement__year {
            display: block;
            font-size: 0.75rem;
            font-weight: 500;
            letter-spacing: 0.12em;
            line-height: 1.2;
            color: rgba(255, 255, 255, 0.5);
        }

        .mukc-announcement__body {
            max-width: 1050px;
            margin: 0 24px;
            padding: 24px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 0.95rem;
            line-height: 1.75;
            color: rgba(255, 255, 255, 0.85);
            overflow-wrap: anywhere;
        }

        .mukc-announcement__body p,
        .mukc-announcement__body ul {
            margin-bottom: 16px;
        }

        .mukc-announcement__body > :last-child {
            margin-bottom: 0;
        }

        .mukc-announcement__body > br {
            display: none;
        }

        .mukc-announcement__body ul {
            padding-left: 24px;
        }

        .mukc-announcement__body a {
            color: #ffffff;
            text-underline-offset: 3px;
        }

        .mukc-announcements__toggle {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            max-width: 300px;
            margin: 32px auto 0;
            padding: 14px 24px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 4px;
            background: rgba(255, 255, 255, 0.05);
            color: #ffffff;
            font-family: inherit;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s ease;
        }

        .mukc-announcements__toggle:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .mukc-announcements__toggle svg {
            width: 20px;
            height: 20px;
            fill: currentColor;
            transition: transform 0.2s ease;
        }

        .mukc-announcements__toggle[aria-expanded="true"] svg {
            transform: rotate(180deg);
        }

        @media (max-width: 900px) {
            .mukc-announcements {
                padding: 60px 24px;
            }

            .mukc-announcements__header h2 {
                font-size: clamp(1.5rem, 7.5vw, 2.2rem);
                letter-spacing: 0.02em;
            }

            .mukc-announcements__columns {
                display: none;
            }

            .mukc-announcement__row {
                grid-template-columns: minmax(0, 1fr) 92px;
                gap: 20px;
                padding: 24px;
            }

            .mukc-announcement__heading {
                grid-column: 1;
                grid-row: 1;
            }

            .mukc-announcement__date {
                grid-column: 2;
                grid-row: 1;
                align-self: start;
            }

            .mukc-announcement__excerpt {
                grid-column: 1 / -1;
                grid-row: 2;
            }

            .mukc-announcement__day {
                font-size: 3rem;
            }

            .mukc-announcement__month,
            .mukc-announcement__year {
                font-size: 0.7rem;
            }
        }

        @media (max-width: 480px) {
            .mukc-announcement__row {
                grid-template-columns: minmax(0, 1fr) 80px;
                gap: 16px;
                padding: 20px;
            }

            .mukc-announcement h3 {
                font-size: 1rem;
            }

            .mukc-announcement__day {
                font-size: 2.7rem;
            }

            .mukc-announcement__body {
                margin: 0 20px;
            }
        }

        /* ================================================
           FOOTER
           ================================================ */
        .mukc-footer {
            background: #d9d8d0;
            padding: 48px 60px 28px;
        }

        .mukc-footer__top {
            display: grid;
            grid-template-columns: 1.4fr 1fr 1fr;
            gap: 40px;
            align-items: start;
            margin-bottom: 36px;
        }

        .mukc-footer__brand img {
            width: 240px;
            height: auto;
            display: block;
            margin-bottom: 0px;
            mix-blend-mode: multiply;
            opacity: 0.85;
        }

        .mukc-footer__brand-name {
            font-size: 0.70rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #333333;
            line-height: 1.4;
        }

        .mukc-footer__col-title {
            font-size: 0.90rem;
            font-weight: 600;
            color: #111111;
            margin-bottom: 12px;
        }

        .mukc-footer__col-body {
            font-size: 0.82rem;
            color: #444444;
            line-height: 1.7;
        }

        .mukc-footer__col-body a {
            color: #444444;
            text-decoration: none;
        }

        .mukc-footer__col-body a:hover {
            text-decoration: underline;
        }

        .mukc-footer__col-center {
            text-align: center;
        }

        .mukc-footer__col-right {
            text-align: right;
        }

        .mukc-footer__col-right .mukc-footer__col-body {
            text-align: right;
        }

        .mukc-footer__bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-top: 1px solid rgba(0, 0, 0, 0.12);
            padding-top: 20px;
        }

        .mukc-footer__copy {
            font-size: 0.75rem;
            color: #666666;
        }

        .mukc-footer__social {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .mukc-footer__social a {
            display: flex;
            align-items: center;
            color: #333333;
            transition: color 0.2s;
        }

        .mukc-footer__social a:hover {
            color: #000000;
        }

        .mukc-footer__social svg {
            width: 22px;
            height: 22px;
            fill: currentColor;
        }

        /* ================================================
           WHAT'S ON SECTION
           ================================================ */
        .mukc-whatson {
            position: relative;
            width: 100%;
            min-height: 680px;
            overflow: hidden;
            display: flex;
            align-items: flex-start;
            color: #ffffff;
        }

        .mukc-whatson__bg {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center bottom;
            filter: brightness(0.55);
        }

        .mukc-whatson__overlay {
            position: absolute;
            inset: 0;
            background:
                linear-gradient(to bottom,
                    rgba(0, 0, 0, 0.30) 0%,
                    rgba(0, 0, 0, 0.16) 52%,
                    rgba(0, 0, 0, 0.06) 100%),
                linear-gradient(to right,
                    rgba(0, 0, 0, 0.70) 0%,
                    rgba(0, 0, 0, 0.35) 48%,
                    rgba(0, 0, 0, 0.08) 100%);
        }

        .mukc-whatson__inner {
            position: relative;
            z-index: 2;
            max-width: calc(1100px + 120px);
            margin: 0 auto;
            padding: 74px 60px 260px;
            width: 100%;
        }

        .mukc-whatson__content {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 60px;
        }

        .mukc-whatson__text {
            max-width: 560px;
        }

        .mukc-whatson__text h2 {
            font-size: 2.4rem;
            font-weight: 800;
            margin-bottom: 24px;
            letter-spacing: -0.01em;
            color: #ffffff;
            text-shadow: 0 2px 12px rgba(0, 0, 0, 0.4);
        }

        .mukc-whatson__text p {
            font-size: 1rem;
            line-height: 1.8;
            color: rgba(255, 255, 255, 0.92);
            margin-bottom: 16px;
            text-shadow: 0 1px 6px rgba(0, 0, 0, 0.35);
        }

        .mukc-whatson__text p strong {
            font-weight: 700;
            color: #ffffff;
        }

        .mukc-newsletter-card {
            flex: 0 0 min(360px, 34vw);
            display: block;
            overflow: hidden;
            color: #111111;
            text-decoration: none;
            background: rgba(255, 255, 255, 0.94);
            border: 1px solid rgba(255, 255, 255, 0.58);
            border-radius: 8px;
            box-shadow: 0 24px 60px rgba(0, 0, 0, 0.34);
            transition: transform 0.22s ease, box-shadow 0.22s ease;
        }

        .mukc-newsletter-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 30px 70px rgba(0, 0, 0, 0.42);
        }

        .mukc-newsletter-card__media {
            position: relative;
            aspect-ratio: 16 / 6;
            overflow: hidden;
            background: #202020;
        }

        .mukc-newsletter-card__media img {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
            object-position: center 46%;
            transition: transform 0.35s ease;
        }

        .mukc-newsletter-card:hover .mukc-newsletter-card__media img {
            transform: scale(1.04);
        }

        .mukc-newsletter-card__badge {
            position: absolute;
            left: 14px;
            top: 14px;
            padding: 6px 9px;
            background: rgba(17, 17, 17, 0.82);
            color: #ffffff;
            border-radius: 4px;
            font-size: 0.72rem;
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .mukc-newsletter-card__body {
            padding: 16px 20px 18px;
        }

        .mukc-newsletter-card__kicker {
            margin-bottom: 6px;
            color: #8f1d1d;
            font-size: 0.72rem;
            font-weight: 850;
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }

        .mukc-newsletter-card__title {
            margin: 0 0 8px;
            color: #111111;
            font-size: 1.16rem;
            font-weight: 850;
            line-height: 1.14;
        }

        .mukc-newsletter-card__copy {
            margin: 0 0 12px;
            color: #454545;
            font-size: 0.86rem;
            line-height: 1.42;
        }

        .mukc-newsletter-card__action {
            display: inline-flex;
            align-items: center;
            color: #111111;
            font-size: 0.86rem;
            font-weight: 800;
        }

        @media (max-width: 900px) {
            .mukc-whatson {
                min-height: 760px;
            }

            .mukc-whatson__inner {
                padding: 54px 24px 280px;
            }

            .mukc-whatson__content {
                flex-direction: column;
                gap: 36px;
            }

            .mukc-whatson__text h2 {
                font-size: 2rem;
            }

            .mukc-newsletter-card {
                flex-basis: auto;
                width: 100%;
                max-width: 430px;
                align-self: flex-start;
            }

        }

        @media (max-width: 768px) {
            .mukc-welcome {
                grid-template-columns: 1fr;
                gap: 24px;
                padding: 32px 0 16px;
            }

            .mukc-footer {
                padding: 36px 24px 20px;
            }

            .mukc-footer__top {
                grid-template-columns: 1fr;
                gap: 28px;
            }

            .mukc-footer__col-body,
            .mukc-footer__col-right .mukc-footer__col-body {
                text-align: left;
            }

            .mukc-footer__col-center,
            .mukc-footer__col-right {
                text-align: left;
            }
        }

        /* ================================================
           SCROLL FADE-IN
           ================================================ */
        .mukc-reveal {
            opacity: 0;
            transform: translateY(24px);
            transition: opacity 0.7s ease, transform 0.7s ease;
        }

        .mukc-reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Stagger children within a section */
        .mukc-reveal[data-delay="1"] {
            transition-delay: 0.12s;
        }

        .mukc-reveal[data-delay="2"] {
            transition-delay: 0.24s;
        }

        .mukc-reveal[data-delay="3"] {
            transition-delay: 0.36s;
        }

        /* Respect reduced motion preference */
        @media (prefers-reduced-motion: reduce) {
            .mukc-reveal {
                opacity: 1;
                transform: none;
                transition: none;
            }
        }
    </style>
</head>

<body <?php body_class('mukc-frontpage'); ?>>
    <?php wp_body_open(); ?>

    <section class="mukc-hero">

        <!-- BG photo & overlay (purely visual) -->
        <div class="mukc-hero__bg" role="presentation" aria-hidden="true"></div>
        <div class="mukc-hero__overlay" aria-hidden="true"></div>

        <!-- ── NAVBAR ── -->
        <nav class="mukc-nav" aria-label="Main navigation">

            <a class="mukc-nav__brand" href="<?php echo esc_url(home_url('/')); ?>">
                <img class="mukc-nav__logo" src="<?php echo esc_url($logo_url); ?>"
                    alt="<?php echo esc_attr($site_name); ?> crest" width="50" height="50">
                <div class="mukc-nav__brand-text">
                    <span class="mukc-nav__name"><?php echo esc_html($site_name); ?></span>
                </div>
            </a>

            <!-- Reference nav links (About MUKC, Our People, Journey, Gear, Contact Us) -->
            <ul class="mukc-nav__menu">
                <li><a href="<?php echo esc_url(home_url('/about-mukc/')); ?>">About MUKC</a></li>
                <li><a href="<?php echo esc_url(home_url('/our-people/')); ?>">Our People</a></li>
                <li><a href="<?php echo esc_url(home_url('/journey/')); ?>">Journeys</a></li>
                <li><a href="<?php echo esc_url(home_url('/gear/')); ?>">Gear</a></li>
                <li><a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact Us</a></li>
            </ul>

            <!-- Mobile burger (Updated with animation) -->
            <button class="mukc-nav__burger" aria-label="Toggle navigation" id="mukcBurger">
                <span></span><span></span><span></span>
            </button>

        </nav>

        <!-- ── QUOTE ── -->
        <div class="mukc-hero__body">
            <div class="mukc-quote">
                <p class="mukc-quote__line">Nothing worthwhile is easy; your responses shape you.</p>
                <p class="mukc-quote__line">The journey is the point of it &ndash; enjoy it.</p>
            </div>
        </div>

        <!-- Scroll hint -->
        <div class="mukc-scroll" aria-hidden="true">
            <svg viewBox="0 0 24 24">
                <polyline points="6 9 12 15 18 9" />
            </svg>
        </div>

    </section>

    <!-- ======================== TRAINING TIMES ======================== -->
    <section class="mukc-training" id="training">
        <div class="mukc-training__inner">

            <!-- Left: schedule info -->
            <div class="mukc-training__left mukc-reveal">
                <h2>Training times</h2>

                <div class="mukc-training__schedule">
                    <p>Monday: 7:30 pm – 9:30 pm</p>
                    <p>Wednesday: 7:30 pm – 9:30 pm</p>
                    <p class="note">Closed on Public and University Holidays</p>
                </div>

                <div class="mukc-training__venue">
                    <p><strong>Venue: Lazer Room in Nona Lee Sports Centre</strong></p>
                    <p class="cta">Interested? Come and try it for free!</p>
                </div>
            </div>

            <!-- Right: embedded Google Map -->
            <!-- Right: embedded Google Map -->
            <iframe class="mukc-map mukc-reveal" data-delay="1"
                src="https://maps.google.com/maps?q=Melbourne+University+Sport+103+Tin+Alley+Parkville&amp;t=&amp;z=17&amp;ie=UTF8&amp;iwloc=A&amp;output=embed"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                title="Melbourne University Sport Dojo">
            </iframe>

        </div>
    </section>

    <!-- ======================== BEGINNER PROGRAM ======================== -->
    <section class="mukc-beginners" id="beginners">
        <div class="mukc-beginners__inner">

            <!-- Left: Text -->
            <div class="mukc-beginners__right mukc-reveal">
                <h2>Beginner Program</h2>
                <div class="mukc-beginners__details">
                    <p><strong>Every Friday</strong></p>
                    <p><strong>6:30 pm – 8:30 pm</strong></p>
                    <p>Room 304, Building 199 – Stop 1</p>
                    <p>University of Melbourne</p>
                </div>
                <p class="mukc-beginners__cta">Bring yourself, we will handle the rest</p>
            </div>

            <!-- Right: Map -->
            <iframe class="mukc-map mukc-reveal" data-delay="1"
                src="https://maps.google.com/maps?q=757+Swanston+Street+Carlton+VIC+3053&amp;t=&amp;z=17&amp;ie=UTF8&amp;iwloc=A&amp;output=embed"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                title="Building 199 Stop 1">
            </iframe>

        </div>
    </section>

    <!-- ======================== MEMBERSHIP FEES ======================== -->
    <section class="mukc-fees" id="membership">
        <div class="mukc-fees__inner">
            <h2 class="mukc-reveal">Membership fees</h2>

            <div class="mukc-fees__list mukc-reveal" data-delay="1">

                <div class="mukc-fees__header">
                    <div>Duration</div>
                    <div style="text-align: right;">Student Fee</div>
                    <div style="text-align: right;">Non-Student Fee</div>
                </div>

                <!-- Single Semester -->
                <div class="mukc-fees__row mukc-row-alt">
                    <div class="mukc-fees__type">
                        <div class="mukc-fees__type-text">Single Semester</div>
                    </div>
                    <div class="mukc-fees__cost" data-label="Student Fee">
                        <span class="mukc-fees__price-wrap"><span>$</span>100</span>
                        <div class="mukc-fees__cost-note">(Includes Non-Melbourne Uni student)</div>
                    </div>
                    <div class="mukc-fees__cost" data-label="Non-Student Fee">
                        <span class="mukc-fees__price-wrap"><span>$</span>140</span>
                    </div>
                </div>

                <!-- Full Year -->
                <div class="mukc-fees__row">
                    <div class="mukc-fees__type">
                        <div class="mukc-fees__type-text">Full Year</div>
                    </div>
                    <div class="mukc-fees__cost" data-label="Student Fee">
                        <span class="mukc-fees__price-wrap"><span>$</span>175</span>
                    </div>
                    <div class="mukc-fees__cost" data-label="Non-Student Fee">
                        <span class="mukc-fees__price-wrap"><span>$</span>255</span>
                    </div>
                </div>

                <!-- Single Session -->
                <div class="mukc-fees__row mukc-row-alt">
                    <div class="mukc-fees__type">
                        <div class="mukc-fees__type-text">Single Session</div>
                    </div>
                    <div class="mukc-fees__cost" data-label="Student Fee">
                        <span class="mukc-fees__price-wrap"><span>$</span>15</span>
                    </div>
                    <div class="mukc-fees__cost" data-label="Non-Student Fee">
                        <span class="mukc-fees__price-wrap"><span>$</span>25</span>
                    </div>
                </div>

            </div>

            <!-- Welcome + bank details -->
            <div class="mukc-welcome">
                <div class="mukc-welcome__text">
                    <p style="margin-bottom: 12px;">
                        Complete beginner? Different style? Returning after years away?<br>
                        <strong>You belong here.</strong><br>
                        Our doors are open to everyone.
                    </p>
                    <p class="mukc-welcome__cta">Come along and try it out. Your first two lessons will be&nbsp;free!
                    </p>
                </div>
                <div class="mukc-welcome__bank">
                    <strong>Melbourne University Karate Club</strong>
                    BSB: 083-170<br>
                    ACC: 51-561-4159
                </div>
            </div>

            <!-- Registration + Grading Fees Links -->
            <div style="text-align: left; margin-top: 16px; margin-bottom: 32px; display: flex; gap: 20px; flex-wrap: wrap;" class="mukc-reveal" data-delay="1">
                <a href="https://docs.google.com/forms/d/e/1FAIpQLSekzkpS5rESymDeYg_qCwXWUOLXW0iEU1CtDFXgVuKTDt3BIg/viewform" target="_blank" rel="noopener" class="mukc-fees__btn">
                    Register Now &rarr;
                </a>
                <a href="<?php echo esc_url(site_url('/about-mukc/#grading')); ?>" class="mukc-fees__btn" style="background: transparent; color: #111111; border: 1px solid #111111; box-shadow: none;">
                    View Grading Fees &rarr;
                </a>
            </div>

        </div>
    </section>

    <!-- ======================== WHAT'S ON ======================== -->
    <section class="mukc-whatson" id="whatson">
        <img class="mukc-whatson__bg"
            src="<?php echo esc_url(content_url('uploads/2026/02/9febc689a300d495ee6764cca5414690.jpeg')); ?>"
            alt="MUKC Annual Camp" aria-hidden="true">
        <div class="mukc-whatson__overlay" aria-hidden="true"></div>

        <div class="mukc-whatson__inner">
            <div class="mukc-whatson__content">
                <div class="mukc-whatson__text mukc-reveal">
                    <h2>What's On</h2>
                    <p>
                        <strong>Camp 2026 was a huge success</strong>, with great training, great food,
                        and a fantastic new venue. Thanks to everyone who joined us for an unforgettable
                        weekend with Rhee Taekwondo and Wushu.
                    </p>
                    <p>
                        Coming up next, we&rsquo;ll be heading to <strong>go-karting</strong> in May, with the date to be
                        confirmed soon, so keep an eye out and respond to Ibuki&rsquo;s poll.
                    </p>
                    <p>
                        We&rsquo;re also planning a <strong>Camp Recap event</strong> and will soon be sharing new
                        Karate Journey member stories.
                    </p>
                </div>
                <a href="<?php echo esc_url($newsletter_url); ?>" target="_blank" rel="noopener" class="mukc-newsletter-card mukc-reveal" data-delay="1" aria-label="Read MUKC Newsletter April 2026 on Substack">
                    <div class="mukc-newsletter-card__media">
                        <img src="<?php echo esc_url($newsletter_image); ?>" alt="MUKC Martial Arts Camp 2026 group photo">
                        <span class="mukc-newsletter-card__badge">Newsletter</span>
                    </div>
                    <div class="mukc-newsletter-card__body">
                        <p class="mukc-newsletter-card__kicker">April 2026</p>
                        <h3 class="mukc-newsletter-card__title">MUKC Newsletter</h3>
                        <p class="mukc-newsletter-card__copy">Updates from Martial Arts Camp 2026 and the next social event.</p>
                        <span class="mukc-newsletter-card__action">Read the full update &rarr;</span>
                    </div>
                </a>
            </div>
        </div>
    </section>
    
    <!-- ======================== ANNOUNCEMENTS ======================== -->
    <section class="mukc-announcements" id="announcements" aria-labelledby="announcementsTitle">
        <div class="mukc-announcements__inner">
            <div class="mukc-announcements__header mukc-reveal">
                <h2 id="announcementsTitle">Announcements</h2>
                <p>Latest club updates, events and important notices.</p>
            </div>
            <?php
            $announcements = require get_stylesheet_directory() . '/inc/announcements.php';
            $announcement_groups = [array_slice($announcements, 0, 3), array_slice($announcements, 3)];
            ?>
            <div class="mukc-announcements__list mukc-reveal" data-delay="1">
                <div class="mukc-announcements__columns" aria-hidden="true">
                    <span>Announcement</span>
                    <span>Update</span>
                    <span>Posted</span>
                </div>
                <?php foreach ($announcement_groups as $group_index => $group): ?>
                    <div class="mukc-announcements__group"<?php if ($group_index === 1): ?> id="announcementsMore" hidden<?php endif; ?>>
                        <?php foreach ($group as $announcement): ?>
                            <?php $announcement_date = new DateTimeImmutable($announcement['date']); ?>
                            <article class="mukc-announcement">
                                <details>
                                    <summary class="mukc-announcement__row">
                                        <div class="mukc-announcement__heading">
                                            <h3><?php echo esc_html($announcement['title']); ?></h3>
                                            <span class="mukc-announcement__hint">
                                                <span class="mukc-announcement__read">Read announcement</span>
                                                <span class="mukc-announcement__close">Close announcement</span>
                                                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 10l5 5 5-5z" /></svg>
                                            </span>
                                        </div>
                                        <p class="mukc-announcement__excerpt"><?php echo esc_html($announcement['excerpt']); ?></p>
                                        <time class="mukc-announcement__date" datetime="<?php echo esc_attr($announcement['date']); ?>" aria-label="<?php echo esc_attr($announcement_date->format('j F Y')); ?>">
                                            <span class="mukc-announcement__month"><?php echo esc_html($announcement_date->format('M')); ?></span>
                                            <span class="mukc-announcement__day"><?php echo esc_html($announcement_date->format('d')); ?></span>
                                            <span class="mukc-announcement__year"><?php echo esc_html($announcement_date->format('Y')); ?></span>
                                        </time>
                                    </summary>
                                    <div class="mukc-announcement__body"><?php echo wp_kses_post($announcement['content']); ?></div>
                                </details>
                            </article>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php if (count($announcements) > 3): ?>
                <button class="mukc-announcements__toggle" id="announcementsToggle" type="button" aria-expanded="false" aria-controls="announcementsMore">
                    <span>Show all announcements</span>
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 10l5 5 5-5z" /></svg>
                </button>
            <?php endif; ?>
        </div>
    </section>

    <!-- ======================== FOOTER ======================== -->
    <footer class="mukc-footer">

        <div class="mukc-footer__top">

            <!-- Brand -->
            <div class="mukc-footer__brand">
                <img src="<?php echo esc_url(content_url('uploads/2026/02/On-white.png')); ?>" alt="MUKC footer icon">
            </div>

            <!-- Location -->
            <div class="mukc-footer__col-center">
                <p class="mukc-footer__col-title">Location</p>
                <p class="mukc-footer__col-body">
                    Nona Lee Sports Centre &middot; Lazer Room<br>
                    (located in University of Melbourne Parkville)
                </p>
            </div>

            <!-- Contact -->
            <div class="mukc-footer__col-right">
                <p class="mukc-footer__col-title">Contact</p>
                <p class="mukc-footer__col-body">
                    <a href="mailto:melbourneunikarateclub@gmail.com">melbourneunikarateclub@gmail.com</a>
                </p>
            </div>

        </div>

        <div class="mukc-footer__bottom">
            <span class="mukc-footer__copy">&copy; 1997&ndash;2026 Melbourne University Karate Club<br>Reg. No.
                A0035839X<br>ABN 20 213 278 331</span>

            <div class="mukc-footer__social">
                <!-- YouTube -->
                <a href="https://www.youtube.com/@melbourneuniversitykarate" target="_blank" rel="noopener"
                    aria-label="YouTube">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M23.498 6.186a2.998 2.998 0 0 0-2.11-2.12C19.505 3.5 12 3.5 12 3.5s-7.505 0-9.388.566A2.998 2.998 0 0 0 .502 6.186 31.408 31.408 0 0 0 0 12a31.408 31.408 0 0 0 .502 5.814 2.998 2.998 0 0 0 2.11 2.12C4.495 20.5 12 20.5 12 20.5s7.505 0 9.388-.566a2.998 2.998 0 0 0 2.11-2.12A31.408 31.408 0 0 0 24 12a31.408 31.408 0 0 0-.502-5.814zM9.75 15.5v-7l6.5 3.5-6.5 3.5z" />
                    </svg>
                </a>
                <!-- Facebook -->
                <a href="https://www.facebook.com/groups/132927239365" target="_blank" rel="noopener"
                    aria-label="Facebook">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M24 12.073C24 5.405 18.627 0 12 0S0 5.405 0 12.073C0 18.1 4.388 23.094 10.125 24v-8.437H7.078v-3.49h3.047V9.41c0-3.025 1.792-4.697 4.533-4.697 1.312 0 2.686.236 2.686.236v2.97h-1.513c-1.491 0-1.956.93-1.956 1.883v2.271h3.328l-.532 3.49h-2.796V24C19.612 23.094 24 18.1 24 12.073z" />
                    </svg>
                </a>
                <!-- Instagram -->
                <a href="https://www.instagram.com/melbourneunikarateclub/" target="_blank" rel="noopener"
                    aria-label="Instagram">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.334 3.608 1.31.975.975 1.247 2.242 1.31 3.608.058 1.265.069 1.645.069 4.849s-.011 3.584-.069 4.849c-.063 1.366-.335 2.633-1.31 3.608-.975.975-2.242 1.247-3.608 1.31-1.266.058-1.646.069-4.85.069s-3.584-.011-4.849-.069c-1.366-.063-2.633-.335-3.608-1.31-.975-.975-1.247-2.242-1.31-3.608C2.175 15.584 2.163 15.204 2.163 12s.012-3.584.07-4.849c.062-1.366.334-2.633 1.31-3.608.975-.975 2.242-1.248 3.608-1.31C8.416 2.175 8.796 2.163 12 2.163zm0-2.163C8.741 0 8.332.014 7.052.072 5.197.157 3.355.673 2.014 2.014.673 3.355.157 5.197.072 7.052.014 8.332 0 8.741 0 12s.014 3.668.072 4.948c.085 1.855.601 3.697 1.942 5.038 1.341 1.341 3.183 1.857 5.038 1.942C8.332 23.986 8.741 24 12 24s3.668-.014 4.948-.072c1.855-.085 3.697-.601 5.038-1.942 1.341-1.341 1.857-3.183 1.942-5.038C23.986 15.668 24 15.259 24 12s-.014-3.668-.072-4.948c-.085-1.855-.601-3.697-1.942-5.038C20.645.673 18.803.157 16.948.072 15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zm0 10.162a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z" />
                    </svg>
                </a>
            </div>
        </div>

    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const nav = document.querySelector('.mukc-nav');
            const burger = document.getElementById('mukcBurger');
            const menu = document.querySelector('.mukc-nav__menu');

            // Scroll Logic
            const handleScroll = () => {
                if (window.scrollY > 50) {
                    nav.classList.add('is-scrolled');
                } else {
                    nav.classList.remove('is-scrolled');
                }
            };
            window.addEventListener('scroll', handleScroll);
            handleScroll();

            // Show the three newest announcements first; reveal older posts on request.
            const announcementsToggle = document.getElementById('announcementsToggle');
            const announcementsMore = document.getElementById('announcementsMore');
            if (announcementsToggle && announcementsMore) {
                announcementsToggle.addEventListener('click', function () {
                    const isExpanded = announcementsToggle.getAttribute('aria-expanded') === 'true';
                    announcementsMore.hidden = isExpanded;
                    announcementsToggle.setAttribute('aria-expanded', String(!isExpanded));
                    announcementsToggle.querySelector('span').textContent = isExpanded ? 'Show all announcements' : 'Show less';
                    if (isExpanded) {
                        announcementsToggle.scrollIntoView({ block: 'nearest' });
                    }
                });
            }

            // Scroll Reveal
            const reveals = document.querySelectorAll('.mukc-reveal');
            if (reveals.length) {
                const observer = new IntersectionObserver(function (entries) {
                    entries.forEach(function (entry) {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-visible');
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.15 });
                reveals.forEach(function (el) { observer.observe(el); });
            }

            // Burger Logic
            if (burger && menu) {
                burger.addEventListener('click', function (e) {
                    e.stopPropagation();
                    burger.classList.toggle('is-active');
                    menu.classList.toggle('is-open');
                    document.body.classList.toggle('no-scroll');
                });

                // Close on link click
                menu.querySelectorAll('a').forEach(link => {
                    link.addEventListener('click', () => {
                        burger.classList.remove('is-active');
                        menu.classList.remove('is-open');
                        document.body.classList.remove('no-scroll');
                    });
                });

                // Close on outside click
                document.addEventListener('click', (e) => {
                    if (menu.classList.contains('is-open') && !menu.contains(e.target) && !burger.contains(e.target)) {
                        burger.classList.remove('is-active');
                        menu.classList.remove('is-open');
                        document.body.classList.remove('no-scroll');
                    }
                });
            }
        });
    </script>
    <?php wp_footer(); ?>
</body>

</html>
