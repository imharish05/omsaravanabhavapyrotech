@extends('layouts.default')

@section('main-page')

    @push('styles')
        <style>
            /* ===========================================
           PRISTINE SUCCESS TERMINAL (GOLDEN LIGHT - WHITE)
           =========================================== */

            :root {
                --ink: #111111;
                --gold-deep: #B8860B;
                --gold-soft: #f4ece1;
                --cream: #f9f7f2;
                --stone: #e8e4db;
                --glass-white: rgba(255, 255, 255, 0.8);
                --font-display: 'Outfit', sans-serif;
                --font-body: 'Outfit', sans-serif;
            }

            .success-page {
                background: var(--cream);
                min-height: 100vh;
                padding-bottom: 100px;
                position: relative;
                overflow-x: hidden;
                color: var(--ink);
            }

            /* 1. LIGHT CINEMATIC HERO */
            .success-hero {
                height: 65vh;
                position: relative;
                display: flex;
                align-items: center;
                justify-content: center;
                text-align: center;
                overflow: hidden;
                background: #fff;
            }

            .hero-bg {
                position: absolute;
                inset: 0;
                background-image: url('{{ asset('brain/4d8ae542-7bd4-4c30-876d-25d65ee76364/success_light_heritage_1776426911549.png') }}');
                background-size: cover;
                background-position: center;
                transform: scale(1.1);
                filter: brightness(1.05);
                /* Make it bright */
                transition: transform 0.5s cubic-bezier(0.165, 0.84, 0.44, 1);
            }

            .hero-overlay {
                position: absolute;
                inset: 0;
                background: radial-gradient(circle at center, rgba(255, 255, 255, 0.4) 0%, var(--cream) 90%);
            }

            .success-hero-content {
                position: relative;
                z-index: 10;
                padding: 0 20px;
            }

            .success-check-orb {
                width: 110px;
                height: 110px;
                background: linear-gradient(145deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.05));
                backdrop-filter: blur(15px);
                -webkit-backdrop-filter: blur(15px);
                border: 2px solid rgba(255, 255, 255, 0.6);
                border-radius: 50%;
                margin: 0 auto 30px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 2.5rem;
                color: #FFFFFF;
                box-shadow: 
                    0 0 30px rgba(255, 255, 255, 0.2),
                    inset 0 1px 0 rgba(255, 255, 255, 0.5);
                animation: orbPulse 3s infinite alternate;
                text-shadow: 0 0 15px rgba(255, 255, 255, 0.6);
            }

            .success-eyebrow {
                font-size: 0.9rem;
                font-weight: 800;
                text-transform: uppercase;
                letter-spacing: 6px;
                color: var(--gold-deep);
                margin-bottom: 15px;
            }

            .success-title {
                font-family: var(--font-display);
                font-size: clamp(2.5rem, 6vw, 4.5rem);
                line-height: 1;
                color: #fff;
                margin-bottom: 25px;
                font-weight: 900;
                text-shadow:
                    0 2px 10px rgba(255, 255, 255, 0.3),
                    0 0 40px rgba(255, 255, 255, 0.2),
                    0 0 80px rgba(255, 255, 255, 0.1);
            }

            .success-title span {
                display: block;
                font-style: italic;
                font-weight: 400;
                color: var(--gold-deep);
                opacity: 0.9;
            }

            .token-pill {
                display: inline-flex;
                align-items: center;
                gap: 15px;
                background: linear-gradient(135deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0.05));
                backdrop-filter: blur(10px);
                border: 1.5px solid rgba(255, 255, 255, 0.4);
                padding: 10px 25px;
                border-radius: 50px;
                box-shadow: 
                    0 10px 30px rgba(0, 0, 0, 0.3),
                    inset 0 1px 0 rgba(255, 255, 255, 0.3);
            }

            .token-id {
                color: var(--gold-deep);
                font-weight: 900;
            }

            /* 2. LIGHT DATA TERMINALS */
            .success-container {
                width: min(100% - 40px, 1200px);
                margin: -80px auto 0;
                position: relative;
                z-index: 20;
            }

            .terminal-card {
                background: linear-gradient(145deg, rgba(255, 255, 255, 0.08), rgba(255, 255, 255, 0.03));
                backdrop-filter: blur(25px);
                -webkit-backdrop-filter: blur(25px);
                border: 2px solid rgba(255, 255, 255, 0.5) !important;
                border-radius: 40px;
                margin-bottom: 30px;
                overflow: hidden;
                box-shadow: 
                    0 24px 70px rgba(0, 0, 0, 0.45),
                    inset 0 1px 0 rgba(255, 255, 255, 0.3);
                position: relative;
            }

            .terminal-card::before {
                content: '';
                position: absolute;
                top: 0; left: 0; right: 0; bottom: 0;
                background: radial-gradient(circle at 50% 0%, rgba(255, 255, 255, 0.05) 0%, transparent 70%);
                pointer-events: none;
            }

            .terminal-header {
                background: #fafafafa;
                padding: 30px 40px;
                border-bottom: 1px solid var(--stone);
                display: flex;
                align-items: center;
                gap: 15px;
                font-family: var(--font-display);
                font-size: 1.5rem;
                color: var(--ink);
            }

            .terminal-header i {
                color: var(--gold-deep);
            }

            /* 3. SHOWCASE TABLE */
            .showcase-table-wrap {
                overflow-x: auto;
            }

            .showcase-table {
                width: 100%;
                border-collapse: collapse;
                min-width: 600px;
            }

            .showcase-table th {
                padding: 20px 24px;
                text-align: left;
                font-size: 0.75rem;
                font-weight: 800;
                text-transform: uppercase;
                color: var(--muted);
                letter-spacing: 2px;
            }

            .showcase-table td {
                padding: 20px 24px;
                border-top: 1px solid #f5f5f5;
            }

            .prod-preview {
                display: flex;
                align-items: center;
                gap: 20px;
            }

            .prod-preview img {
                width: 55px;
                height: 55px;
                border-radius: 12px;
                object-fit: cover;
                border: 1px solid #eee;
            }

            .prod-name {
                font-weight: 800;
                color: var(--ink);
            }

            .val-box {
                color: #555;
                font-weight: 600;
                font-family: var(--font-body);
            }

            .qty-tag {
                background: var(--gold-soft);
                color: var(--gold-deep);
                padding: 5px 12px;
                border-radius: 10px;
                font-weight: 900;
                font-size: 0.8rem;
            }

            .tfoot-row {
                border-top: 2px solid var(--stone);
            }
            .grand-total-label {
                padding: 20px 40px;
                font-weight: 800;
                font-size: 1.1rem;
                color: var(--ink, #111);
                white-space: nowrap;
            }
            .grand-total-divider {
                padding: 20px 40px;
                text-align: center;
                font-weight: 800;
                font-size: 1.1rem;
                color: #888;
            }
            .grand-total-value {
                padding: 20px 40px;
                text-align: right;
                font-weight: 900;
                font-size: 1.4rem;
                color: var(--gold-deep, #B8860B);
                white-space: nowrap;
            }

            /* 4. FINANCIAL WRAP */
            .financial-strip {
                padding: 40px;
            }

            .fin-row {
                display: flex;
                justify-content: space-between;
                margin-bottom: 15px;
                font-weight: 700;
                color: #666;
            }

            .fin-row.savings {
                background: #f0fff4;
                border: 1px solid #c6f6d5;
                padding: 20px 30px;
                border-radius: 20px;
                color: #2f855a;
            }

            .fin-row.total {
                margin-top: 30px;
                padding-top: 30px;
                border-top: 1px dashed var(--stone);
                font-size: 2.2rem;
                color: var(--ink);
            }

            .fin-row.total .val {
                color: var(--gold-deep);
                font-weight: 900;
            }

            /* 5. PAYMENT HUB */
            .pay-grid {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 20px;
                padding: 40px;
            }

            .pay-slab {
                background: linear-gradient(145deg, rgba(255, 255, 255, 0.06), rgba(255, 255, 255, 0.02));
                border: 1.5px solid rgba(255, 255, 255, 0.3);
                padding: 30px;
                border-radius: 25px;
                box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2);
            }

            .slab-meta {
                font-size: 0.9rem;
                line-height: 2.2;
                color: #666;
            }

            .slab-meta strong {
                color: var(--ink);
                width: 110px;
                display: inline-block;
                font-weight: 800;
            }

            .slab-qr {
                margin-top: 25px;
                display: flex;
                gap: 20px;
            }

            .slab-qr img {
                width: 90px;
                height: 90px;
                border-radius: 15px;
                padding: 5px;
                background: #fff;
                border: 1px solid #eee;
            }

            /* 6. ACTIONS */
            .action-strip {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 20px;
                margin-top: 40px;
            }

            .a-btn {
                height: 70px;
                border-radius: 25px;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 12px;
                font-weight: 900;
                text-transform: uppercase;
                text-decoration: none;
                transition: 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
                border: none;
                cursor: pointer;
            }

            .a-btn:hover {
                transform: translateY(-8px);
            }

            .a-btn-dark {
                background: #fff;
                color: #080810;
                box-shadow: 0 15px 35px rgba(255, 255, 255, 0.2);
            }

            .a-btn-dark:hover {
                background: #f0f0f0;
                transform: translateY(-5px);
            }

            .a-btn-ghost {
                background: rgba(255, 255, 255, 0.1);
                color: #fff;
                border: 1.5px solid rgba(255, 255, 255, 0.5);
                backdrop-filter: blur(10px);
            }

            .a-btn-ghost:hover {
                background: #fff;
                color: #111;
                transform: translateY(-5px);
            }

            .a-btn-gold {
                background: linear-gradient(135deg, var(--gold-light), var(--gold));
                color: #111;
                box-shadow: 0 15px 35px rgba(240, 168, 50, 0.3);
            }

            @keyframes orbPulse {
                from {
                    transform: scale(1);
                    box-shadow: 0 0 20px rgba(184, 134, 11, 0.1);
                }

                to {
                    transform: scale(1.05);
                    box-shadow: 0 0 40px rgba(184, 134, 11, 0.3);
                }
            }

            @media (max-width: 900px) {

                .pay-grid,
                .action-strip {
                    grid-template-columns: 1fr;
                }

                .success-container {
                    margin-top: -40px;
                }

                .success-hero {
                    height: 50vh;
                }
            }

            /* Dark premium polish aligned with home/about/contact */
            .success-page {
                background:
                    linear-gradient(180deg, rgba(8,8,16,0.98), rgba(12,12,24,0.98));
                color: #fff;
            }

            .success-hero {
                min-height: 580px;
                background: #080810;
            }

            .hero-bg {
                filter: brightness(0.55) saturate(1.1);
            }

            .hero-overlay {
                background:
                    radial-gradient(circle at 50% 42%, rgba(240,168,50,0.16), transparent 18rem),
                    linear-gradient(to bottom, rgba(8,8,16,0.66), rgba(8,8,16,0.97));
            }

            .success-check-orb {
                background: rgba(15,15,28,0.92);
                border-color: rgba(240,168,50,0.5);
                color: var(--gold-light);
            }

            .success-title {
                color: #fff;
                font-weight: 900;
            }

            .success-title span,
            .token-id,
            .fin-row.total .val {
                color: var(--gold-light);
            }

            .token-pill,
            .terminal-card,
            .pay-slab,
            .a-btn-ghost {
                background: rgba(15,15,28,0.92);
                border-color: rgba(240,168,50,0.22);
                box-shadow: 0 24px 70px rgba(0,0,0,0.45);
            }

            .token-pill span:first-child,
            .terminal-header,
            .prod-name,
            .fin-row.total,
            .slab-meta strong,
            .a-btn-ghost {
                color: #fff !important;
            }

            .terminal-header {
                background: rgba(255,255,255,0.04);
                border-bottom-color: rgba(255,255,255,0.1);
            }

            .showcase-table th,
            .fin-row,
            .slab-meta {
                color: rgba(255,255,255,0.62);
            }

            .showcase-table td {
                border-top-color: rgba(255,255,255,0.08);
            }

            .grand-total-label {
                color: #fff !important;
            }
            .grand-total-divider {
                color: rgba(255,255,255,0.4) !important;
            }
            .grand-total-value {
                color: var(--gold-light, #eebe6c) !important;
            }
            .tfoot-row {
                border-top-color: rgba(255,255,255,0.08) !important;
            }

            .qty-tag,
            .fin-row.savings {
                background: rgba(37,211,102,0.12);
                border-color: rgba(37,211,102,0.22);
            }

            .a-btn-dark {
                background: #fff;
                color: #080810;
            }

            .a-btn-gold {
                background: linear-gradient(135deg, var(--gold-light), var(--gold));
                color: #080810;
            }

            @media (max-width: 768px) {
                /* Hide table header on mobile */
                .showcase-table thead {
                    display: none !important;
                }

                /* Convert table layout to blocks */
                .showcase-table,
                .showcase-table tbody,
                .showcase-table tr,
                .showcase-table td {
                    display: block !important;
                    width: 100% !important;
                    box-sizing: border-box;
                }
                .showcase-table {
                    min-width: 0 !important;
                }

                /* Style each row as a card */
                .showcase-table tbody tr {
                    background: #fbfbfb !important;
                    border: 1px solid rgba(0, 0, 0, 0.05) !important;
                    border-radius: 20px;
                    padding: 20px !important;
                    margin-bottom: 20px;
                    position: relative;
                    color: #111 !important;
                }

                /* Style cells */
                .showcase-table tbody td {
                    padding: 10px 0 !important;
                    border: none !important;
                    text-align: left !important;
                    font-size: 0.95rem;
                    display: flex !important;
                    justify-content: space-between;
                    align-items: center;
                    border-bottom: 1px dashed rgba(0, 0, 0, 0.04) !important;
                    color: #111 !important;
                }

                .showcase-table tbody td .val-box:not([style]) {
                    color: #111 !important;
                }

                .showcase-table tbody td:nth-child(6) .val-box {
                    color: #111 !important;
                    font-weight: 800 !important;
                }

                .showcase-table tbody td .qty-tag {
                    background: var(--gold-soft, #f4ece1) !important;
                    color: var(--gold-deep, #B8860B) !important;
                    display: inline-block !important;
                }

                /* Product Info cell header */
                .showcase-table tbody td:nth-child(1) {
                    display: block !important;
                    border-bottom: 1px solid rgba(0, 0, 0, 0.06) !important;
                    padding-bottom: 12px !important;
                    margin-bottom: 8px !important;
                    color: #111 !important;
                }

                .showcase-table tbody td:nth-child(1) .prod-name {
                    color: #111 !important;
                    font-weight: 800;
                }

                .showcase-table tbody td:nth-child(6) {
                    border-bottom: none !important;
                    font-weight: 800;
                }

                /* Add label prefixes using ::before */
                .showcase-table tbody td:nth-child(2)::before {
                    content: 'Quantity:';
                    font-weight: 700;
                    opacity: 0.6;
                    color: #111 !important;
                }
                .showcase-table tbody td:nth-child(3)::before {
                    content: 'MRP Amount:';
                    font-weight: 700;
                    opacity: 0.6;
                    color: #111 !important;
                }
                .showcase-table tbody td:nth-child(4)::before {
                    content: 'Discount:';
                    font-weight: 700;
                    opacity: 0.6;
                    color: #111 !important;
                }
                .showcase-table tbody td:nth-child(5)::before {
                    content: 'Discounted Price:';
                    font-weight: 700;
                    opacity: 0.6;
                    color: #111 !important;
                }
                .showcase-table tbody td:nth-child(6)::before {
                    content: 'Item Total:';
                    font-weight: 700;
                    opacity: 0.6;
                    color: #111 !important;
                }

                /* Convert table footer to block card */
                .showcase-table tfoot {
                    display: block !important;
                    margin-top: 25px;
                    background: rgba(240, 168, 50, 0.06) !important;
                    border: 1px solid rgba(240, 168, 50, 0.15) !important;
                    border-radius: 20px;
                    padding: 20px !important;
                }
                .showcase-table tfoot tr {
                    display: flex !important;
                    justify-content: space-between;
                    align-items: center;
                    border: none !important;
                    width: 100% !important;
                }
                .showcase-table tfoot td {
                    display: block !important;
                    padding: 0 !important;
                    border: none !important;
                }
                .showcase-table tfoot td.grand-total-divider {
                    display: none !important;
                }
                .showcase-table tfoot td.grand-total-label {
                    font-size: 1.1rem !important;
                    color: var(--ink, #111) !important;
                }
                .showcase-table tfoot td.grand-total-value {
                    font-size: 1.4rem !important;
                    color: var(--gold-deep, #B8860B) !important;
                    text-align: right !important;
                }

                /* Dark Mode overrides for mobile cards */
                .success-page:not([class*="light"]) .showcase-table tbody tr {
                    background: rgba(255, 255, 255, 0.02) !important;
                    border: 1px solid rgba(255, 255, 255, 0.08) !important;
                    color: #fff !important;
                }
                .success-page:not([class*="light"]) .showcase-table tbody td {
                    border-bottom-color: rgba(255, 255, 255, 0.04) !important;
                    color: #fff !important;
                }
                .success-page:not([class*="light"]) .showcase-table tbody td:nth-child(1) {
                    border-bottom-color: rgba(255, 255, 255, 0.08) !important;
                    color: #fff !important;
                }
                .success-page:not([class*="light"]) .showcase-table tbody td:nth-child(1) .prod-name {
                    color: #fff !important;
                }
                .success-page:not([class*="light"]) .showcase-table tbody td:nth-child(2)::before,
                .success-page:not([class*="light"]) .showcase-table tbody td:nth-child(3)::before,
                .success-page:not([class*="light"]) .showcase-table tbody td:nth-child(4)::before,
                .success-page:not([class*="light"]) .showcase-table tbody td:nth-child(5)::before,
                .success-page:not([class*="light"]) .showcase-table tbody td:nth-child(6)::before {
                    color: #fff !important;
                }
                .success-page:not([class*="light"]) .showcase-table tfoot td.grand-total-label {
                    color: #fff !important;
                }
                .success-page:not([class*="light"]) .showcase-table tfoot td.grand-total-value {
                    color: var(--gold-light, #eebe6c) !important;
                }
            }

            @media (max-width: 575px) {
                .success-container {
                    width: min(100% - 24px, 1200px);
                }

                .terminal-header,
                .financial-strip,
                .pay-grid {
                    padding: 24px;
                }

                .fin-row.total {
                    font-size: 1.55rem;
                }
            }
        </style>
    @endpush

    <div class="success-page light">

        <!-- 1. PRISTINE HERO -->
        <section class="success-hero">
            <div class="hero-bg" id="heroBg"></div>
            <div class="hero-overlay"></div>

            <div class="success-hero-content">
                <div class="success-check-orb wow scaleIn">
                    <i class="fa-solid fa-check"></i>
                </div>
                <div class="success-eyebrow wow fadeInUp">Celebration Confirmed</div>
                <h1 class="success-title wow fadeInUp" data-wow-delay="0.2s">
                    Enquiry Submitted <span>Successfully</span>
                </h1>

                <div class="token-pill wow fadeInUp" data-wow-delay="0.4s">
                    <span
                        style="font-size:0.7rem; opacity:0.5; text-transform:uppercase; letter-spacing:2px; color:var(--ink);">Enquiry
                        ID</span>
                    <span class="token-id">#{{ $order_id }}</span>
                </div>
            </div>
        </section>

        <div class="success-container">

            <!-- 2. ENQUIRY DETAILS -->
            <div class="terminal-card wow fadeInUp">
                <div class="terminal-header">
                    <i class="fa-solid fa-box-open"></i> Enquiry Details
                </div>
                <div class="showcase-table-wrap">
                    <table class="showcase-table">
                        <thead>
                            <tr>
                                <th>Product Information</th>
                                <th>Quantity</th>
                                <th>MRP Amount</th>
                                <th>Discount(%)</th>
                                <th>Discounted Price</th>
                                <th style="text-align:right;">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartItems as $item)
                                @php
                                    $item_actual = (float)($item['actual'] ?? $item['price']);
                                    $item_price = (float)$item['price'];
                                    $discount_percentage = $item_actual > $item_price ? round((1 - ($item_price / $item_actual)) * 100) : 0;
                                @endphp
                                <tr>
                                    <td>
                                        <div class="prod-preview">
                                            @if(!empty($item['img']))
                                                <img src="{{ url($item['img']) }}"
                                                    onerror="this.src='{{ asset('assets/img/placeholder.jpg') }}'">
                                            @endif
                                            <span class="prod-name">{{ $item['product_name'] }}</span>
                                        </div>
                                    </td>
                                    <td><span class="qty-tag">{{ $item['qty'] }}</span></td>
                                    <td><span class="val-box">₹{{ number_format($item_actual, 2) }}</span></td>
                                    <td><span class="val-box" style="color:#16A34A; font-weight:700;">{{ $discount_percentage }}%</span></td>
                                    <td><span class="val-box">₹{{ number_format($item_price, 2) }}</span></td>
                                    <td style="text-align:right;"><span class="val-box"
                                            style="color:var(--ink); font-weight:800;">₹{{ number_format($item['total'], 2) }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="tfoot-row">
                                <td colspan="1" class="grand-total-label">Grand Total</td>
                                <td colspan="4" class="grand-total-divider">-</td>
                                <td class="grand-total-value">₹{{ number_format($netTotal, 2) }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <!-- 5. TERMINAL ACTIONS -->
            <div class="action-strip">
                <a href="/" class="a-btn a-btn-ghost"><i class="fa-solid fa-house"></i> Home</a>
                <button onclick="downloadOrderPDF()" class="a-btn a-btn-dark"><i class="fa-solid fa-file-pdf"></i> Download
                    Enquiry PDF</button>
                {{-- <a href="{{ url('/bank') }}" class="a-btn a-btn-gold"><i class="fa-solid fa-credit-card"></i> Pay Now</a> --}}
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

    <script>
        // PARALLAX EFFECT
        window.addEventListener('scroll', () => {
            const bg = document.getElementById('heroBg');
            if (bg) bg.style.transform = `scale(1.1) translateY(${window.scrollY * 0.4}px)`;
        });

        const ORDER_DATA = {
            orderId: "{{ $order_id }}",
            netTotal: {{ $netTotal }},
            items: @json($cartItems),
            customerName: "{{ $order->name ?? '' }}",
            customerAddress: "{{ $order->address ?? '' }}",
            customerArea: "{{ $order->area ?? '' }}",
            customerCity: "{{ $order->city ?? '' }}",
            customerState: "{{ $order->state ?? '' }}",
            customerPincode: "{{ $order->pincode ?? '' }}",
            customerPhone: "{{ $customer->phone_number ?? '' }}",
            orderDate: "{{ $order ? date('d-m-Y', strtotime($order->created_at)) : '' }}",
            logo: "{{ $logo_base64 }}",
            muruganImage: "{{ $murugan_base64 }}",
            companyName: "{{ $global_settings->company_name ?? 'OM SARAVANABHAVA PYROTECH' }}",
            companyAddress: "{!! str_replace(["\r\n", "\r", "\n"], '<br>', e($global_settings->address ?? '')) !!}",
            companyPhone: "{{ $global_settings->phone_number ?? '' }}",
            companyWhatsapp: "{{ $global_settings->whatsapp_number ?? '' }}"
        };

        var numberToWordsArr = ['', 'One ', 'Two ', 'Three ', 'Four ', 'Five ', 'Six ', 'Seven ', 'Eight ', 'Nine ', 'Ten ', 'Eleven ',
            'Twelve ', 'Thirteen ', 'Fourteen ', 'Fifteen ', 'Sixteen ', 'Seventeen ', 'Eighteen ', 'Nineteen '
        ];
        var numberToWordsDec = ['', '', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];

        function convertNumberToWords(num) {
            if ((num = num.toString()).length > 9) return 'overflow';
            let n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
            if (!n) return '';
            var str = '';
            str += (n[1] != 0) ? (numberToWordsArr[Number(n[1])] || numberToWordsDec[n[1][0]] + ' ' + numberToWordsArr[n[1][1]]) + 'Crore ' : '';
            str += (n[2] != 0) ? (numberToWordsArr[Number(n[2])] || numberToWordsDec[n[2][0]] + ' ' + numberToWordsArr[n[2][1]]) + 'Lakh ' : '';
            str += (n[3] != 0) ? (numberToWordsArr[Number(n[3])] || numberToWordsDec[n[3][0]] + ' ' + numberToWordsArr[n[3][1]]) + 'Thousand ' : '';
            str += (n[4] != 0) ? (numberToWordsArr[Number(n[4])] || numberToWordsDec[n[4][0]] + ' ' + numberToWordsArr[n[4][1]]) + 'Hundred ' : '';
            str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (numberToWordsArr[Number(n[5])] || numberToWordsDec[n[5][0]] + ' ' + numberToWordsArr[n[5][1]]) + ' ' : '';
            return str;
        }

        // PDF GENERATION
        async function downloadOrderPDF() {
            const btn = document.querySelector('.a-btn-dark');
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-circle-notch fa-spin"></i> PREPARING...';

            try {
                const { jsPDF } = window.jspdf;
                const doc = new jsPDF('p', 'pt', 'a4');
                let rowsHtml = '';
                let totalQty = 0;
                let totalActual = 0;
                let totalDiscount = 0;
                let totalRegular = 0;

                ORDER_DATA.items.forEach((item, i) => {
                    const item_actual = parseFloat(item.actual || item.price);
                    const item_price = parseFloat(item.price);
                    const lineActual = item_actual * parseInt(item.qty);
                    const lineRegular = parseFloat(item.total);
                    const lineDiscount = lineActual - lineRegular;
                    const discount_percentage = item_actual > item_price ? Math.round((1 - (item_price / item_actual)) * 100) : 0;
                    
                    totalQty += parseInt(item.qty);
                    totalActual += lineActual;
                    totalDiscount += lineDiscount;
                    totalRegular += lineRegular;

                    const codeStr = String(item.product_id || '').padStart(3, '0');

                    rowsHtml += `
                        <tr style="border: 1px solid #000000; font-family: Arial, sans-serif;">
                            <td style="padding:10px 5px; text-align:center; border: 1px solid #000000; font-size:14px; font-weight: bold; color:#000;">${i + 1}</td>
                            <td style="padding:10px 5px; text-align:center; border: 1px solid #000000; font-size:14px; font-weight: bold; color:#000;">${codeStr}</td>
                            <td style="padding:10px 10px; text-align:left; border: 1px solid #000000; font-size:14px; font-weight: bold; color:#000;">${item.product_name}</td>
                            <td style="padding:10px 5px; text-align:center; border: 1px solid #000000; font-size:14px; font-weight: bold; color:#000;">${item.qty}</td>
                            <td style="padding:10px 5px; text-align:center; border: 1px solid #000000; font-size:14px; font-weight: bold; color:#000;">${item_actual.toFixed(2)}</td>
                            <td style="padding:10px 5px; text-align:center; border: 1px solid #000000; font-size:14px; font-weight: bold; color:#000;">${lineActual.toFixed(2)}</td>
                            <td style="padding:10px 5px; text-align:center; border: 1px solid #000000; font-size:14px; font-weight: bold; color:#000;">${discount_percentage > 0 ? discount_percentage + '%' : '-'}</td>
                            <td style="padding:10px 5px; text-align:center; border: 1px solid #000000; font-size:14px; font-weight: bold; color:#000;">${lineDiscount.toFixed(2)}</td>
                            <td style="padding:10px 5px; text-align:center; border: 1px solid #000000; font-size:14px; font-weight: bold; color:#000;">${lineRegular.toFixed(2)}</td>
                        </tr>`;
                });

                rowsHtml += `
                    <tr style="border: 2px solid #000000; font-family: Arial, sans-serif;">
                        <td style="padding:10px 5px; border: 1px solid #000000;"></td>
                        <td style="padding:10px 5px; border: 1px solid #000000;"></td>
                        <td style="padding:10px 5px; border: 1px solid #000000;"></td>
                        <td style="padding:10px 5px; text-align:center; border: 1px solid #000000; font-size:14px; font-weight:bold; color:#000;">${totalQty}</td>
                        <td style="padding:10px 5px; border: 1px solid #000000;"></td>
                        <td style="padding:10px 5px; text-align:right; padding-right:10px; border: 1px solid #000000; font-size:14px; font-weight:bold; color:#000;">${totalActual.toFixed(2)}</td>
                        <td style="padding:10px 5px; border: 1px solid #000000;"></td>
                        <td style="padding:10px 5px; text-align:right; padding-right:10px; border: 1px solid #000000; font-size:14px; font-weight:bold; color:#000;">${totalDiscount.toFixed(2)}</td>
                        <td style="padding:10px 5px; text-align:right; padding-right:10px; border: 1px solid #000000; font-size:14px; font-weight:bold; color:#000;">${totalRegular.toFixed(2)}</td>
                    </tr>`;

                const wordsStr = convertNumberToWords(Math.floor(totalRegular)) + 'Only';

                const receiptHtml = `
                    <div id="pdf-receipt-target" style="width: 1000px; background:#ffffff; color:#111; padding:40px; box-sizing: border-box;">
                        <!-- Devotional Title outside main container -->
                        <div style="text-align: center; margin-bottom: 5px;">
                            <h2 style="font-size: 20px; font-weight: bold; text-transform: uppercase; margin: 0; letter-spacing: 2px; color: #000000; font-family: Arial, sans-serif;">Estimate</h2>
                        </div>

                        <!-- Header Box -->
                        <div style="border: 2px solid #000000; padding: 15px; margin-bottom: 15px; font-family: Arial, sans-serif;">
                            <table style="width: 100%; border-collapse: collapse; border: none; margin: 0;">
                                <tr>
                                    <!-- Left: Logo -->
                                    <td style="width: 20%; text-align: left; vertical-align: middle; border: none; padding: 0;">
                                        <img src="${ORDER_DATA.logo}" alt="Logo" style="max-height: 120px; max-width: 120px; border-radius: 50%; object-fit: contain;">
                                    </td>
                                    
                                    <!-- Center: Slogans, Name, Address, Contact -->
                                    <td style="width: 60%; text-align: center; vertical-align: middle; border: none; padding: 0 15px; line-height: 1.5;">
                                        <!-- Tamil slogans -->
                                        <div style="font-size: 12px; margin-bottom: 2px; font-weight: bold;">உ</div>
                                        <div style="font-size: 13px; margin-bottom: 6px; font-weight: bold;">ஓம் முருகன் துணை</div>
                                        
                                        <!-- Company Name -->
                                        <h1 style="font-size: 26px; font-weight: bold; color: #000000; margin: 0 0 5px 0; text-transform: uppercase; letter-spacing: 0.5px;">
                                            ${ORDER_DATA.companyName}
                                        </h1>
                                        
                                        <!-- Address -->
                                        <div style="font-size: 13px; color: #000000; font-weight: bold; margin-bottom: 8px; line-height: 1.4;">
                                            ${ORDER_DATA.companyAddress}
                                        </div>
                                        
                                        <!-- Contact / WhatsApp -->
                                        <div style="display: flex; align-items: center; justify-content: center; font-size: 15px; font-weight: bold;">
                                            <span style="display: inline-flex; align-items: center; justify-content: center;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#25D366" viewBox="0 0 16 16" style="vertical-align: middle; margin-right: 5px;">
                                                    <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.907h.003c4.368 0 7.926-3.559 7.93-7.93a7.897 7.897 0 0 0-2.326-5.645zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.69-4.98c-.202-.1-.1.195-.148-.024-.319-.16-1.89-1.097-2.002-1.14-.113-.043-.195-.065-.278.065-.082.13-.319.4-.392.483-.073.083-.146.092-.348.01A5.135 5.135 0 0 1 5.25 7.08a5.26 5.26 0 0 1-1.078-1.34c-.201-.347-.021-.534.152-.706.156-.155.348-.405.422-.508.073-.103.11-.173.165-.286.055-.113.028-.21-.013-.298-.042-.088-.372-.897-.509-1.229-.134-.325-.268-.28-.369-.285-.101-.005-.217-.005-.333-.005s-.305.044-.464.218C3.045 4.1 2.5 4.634 2.5 5.71c0 1.08.786 2.12 1.078 2.51.293.39 1.542 2.355 3.736 3.3c.523.225.93.36 1.25.463.525.167 1.003.143 1.38.087.42-.062 1.3-.532 1.484-1.047.185-.515.185-.956.13-1.047-.056-.09-.203-.142-.405-.243z"/>
                                                </svg>
                                                ${ORDER_DATA.companyWhatsapp}
                                            </span>
                                        </div>
                                    </td>
                                    
                                    <!-- Right: Murugan image -->
                                    <td style="width: 20%; text-align: right; vertical-align: middle; border: none; padding: 0;">
                                        <img src="${ORDER_DATA.muruganImage}" alt="Lord Murugan" style="max-height: 120px; max-width: 100px; object-fit: contain;">
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <!-- Client Details Box -->
                        <div style="border: 2px solid #000000; margin-bottom: 15px; font-family: Arial, sans-serif;">
                            <table style="width: 100%; border-collapse: collapse; border: none; margin: 0;">
                                <tr>
                                    <td style="width: 60%; padding: 12px; text-align: left; vertical-align: top; font-size: 14px; border: none;">
                                        <table style="width: 100%; border-collapse: collapse; border: none; margin: 0;">
                                            <tr>
                                                <td style="width: 90px; font-weight: bold; padding: 3px 0; border: none;">Name</td>
                                                <td style="width: 15px; padding: 3px 0; border: none; text-align: center;">:</td>
                                                <td style="font-weight: bold; padding: 3px 0; border: none;">${ORDER_DATA.customerName}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold; padding: 3px 0; border: none; vertical-align: top;">Address</td>
                                                <td style="padding: 3px 0; border: none; text-align: center; vertical-align: top;">:</td>
                                                <td style="font-weight: bold; padding: 3px 0; border: none; vertical-align: top;">
                                                    ${ORDER_DATA.customerAddress}<br>
                                                    ${ORDER_DATA.customerArea ? ORDER_DATA.customerArea + ', ' : ''}${ORDER_DATA.customerCity ? ORDER_DATA.customerCity + ', ' : ''}${ORDER_DATA.customerState ? ORDER_DATA.customerState : ''}${ORDER_DATA.customerPincode ? ' - ' + ORDER_DATA.customerPincode : ''}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold; padding: 3px 0; border: none;">Contact</td>
                                                <td style="padding: 3px 0; border: none; text-align: center;">:</td>
                                                <td style="font-weight: bold; padding: 3px 0; border: none;">${ORDER_DATA.customerPhone}</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td style="width: 40%; padding: 12px; text-align: left; vertical-align: top; font-size: 14px; border: none; border-left: 2px solid #000000;">
                                        <table style="width: 100%; border-collapse: collapse; border: none; margin: 0;">
                                            <tr>
                                                <td style="width: 110px; font-weight: bold; padding: 3px 0; border: none;">Estimate No</td>
                                                <td style="width: 15px; padding: 3px 0; border: none; text-align: center;">:</td>
                                                <td style="font-weight: bold; padding: 3px 0; border: none;">${ORDER_DATA.orderId}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold; padding: 3px 0; border: none;">Date</td>
                                                <td style="padding: 3px 0; border: none; text-align: center;">:</td>
                                                <td style="font-weight: bold; padding: 3px 0; border: none;">${ORDER_DATA.orderDate}</td>
                                            </tr>

                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <!-- Items Table -->
                        <table style="width:100%; border-collapse:collapse; border: 2px solid #000000;">
                            <thead>
                                <tr style="background:#ffffff; color:#000000; border-bottom: 2px solid #000000; font-family: Arial, sans-serif;">
                                    <th style="padding:10px 5px; text-align:center; border: 1px solid #000000; font-size:14px; font-weight:bold;">Slno</th>
                                    <th style="padding:10px 5px; text-align:center; border: 1px solid #000000; font-size:14px; font-weight:bold;">Code</th>
                                    <th style="padding:10px 10px; text-align:left; border: 1px solid #000000; font-size:14px; font-weight:bold;">Cracker name</th>
                                    <th style="padding:10px 5px; text-align:center; border: 1px solid #000000; font-size:14px; font-weight:bold;">Quantity</th>
                                    <th style="padding:10px 5px; text-align:center; border: 1px solid #000000; font-size:14px; font-weight:bold;">MRP</th>
                                    <th style="padding:10px 5px; text-align:center; border: 1px solid #000000; font-size:14px; font-weight:bold;">Total MRP</th>
                                    <th style="padding:10px 5px; text-align:center; border: 1px solid #000000; font-size:14px; font-weight:bold;">Disc%</th>
                                    <th style="padding:10px 5px; text-align:center; border: 1px solid #000000; font-size:14px; font-weight:bold;">Discounted Price</th>
                                    <th style="padding:10px 5px; text-align:center; border: 1px solid #000000; font-size:14px; font-weight:bold;">Total</th>
                                </tr>
                            </thead>
                            <tbody>${rowsHtml}</tbody>
                        </table>

                        <!-- Totals & Rupees Table -->
                        <table style="width: 100%; border-collapse: collapse; border: 2px solid #000000; margin-top: 15px; margin-bottom: 15px; font-family: Arial, sans-serif;">
                            <tr>
                                <td style="width: 60%; padding: 15px; text-align: left; vertical-align: middle; font-size: 14px; font-weight: bold; border: none;">
                                    Rupees : <span style="text-transform: capitalize;">${wordsStr}</span>
                                </td>
                                <td style="width: 40%; padding: 12px; text-align: left; vertical-align: top; font-size: 14px; border: none; border-left: 2px solid #000000;">
                                    <table style="width: 100%; border-collapse: collapse; border: none; margin: 0;">
                                        <tr>
                                            <td style="text-align: left; font-weight: bold; padding: 4px 0; border: none;">Total MRP</td>
                                            <td style="text-align: right; font-weight: bold; padding: 4px 0; border: none;">${totalActual.toFixed(2)}</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left; font-weight: bold; padding: 4px 0; border: none;">Discounted Price</td>
                                            <td style="text-align: right; font-weight: bold; padding: 4px 0; border: none;">${totalDiscount.toFixed(2)}</td>
                                        </tr>
                                        <tr style="border-top: 2px solid #000000;">
                                            <td style="text-align: left; font-weight: bold; padding: 8px 0 0 0; font-size: 15px; border: none;">Final Amount</td>
                                            <td style="text-align: right; font-weight: bold; padding: 8px 0 0 0; font-size: 15px; border: none;">${totalRegular.toFixed(2)}</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>

                        <!-- Thank you slogan -->
                        <div style="text-align: center; margin-top: 25px; font-size: 16px; font-weight: bold; color: #000000; font-family: Arial, sans-serif;">
                            Thank you for business with us!
                        </div>
                    </div>`;

                const wrapper = document.createElement('div');
                wrapper.style.cssText = 'position:absolute;top:-9999px;width:1000px;';
                wrapper.innerHTML = receiptHtml;
                document.body.appendChild(wrapper);

                const canvas = await html2canvas(wrapper.querySelector('#pdf-receipt-target'), { scale: 2 });
                document.body.removeChild(wrapper);

                const imgData = canvas.toDataURL('image/jpeg', 0.95);
                
                const pageHeight = doc.internal.pageSize.getHeight();
                const pageWidth = doc.internal.pageSize.getWidth();
                const imgWidth = pageWidth;
                const imgHeight = (canvas.height * pageWidth) / canvas.width;
                
                let heightLeft = imgHeight;
                let position = 0;
                
                doc.addImage(imgData, 'JPEG', 0, position, imgWidth, imgHeight);
                heightLeft -= pageHeight;
                
                while (heightLeft > 0) {
                    position = heightLeft - imgHeight;
                    doc.addPage();
                    doc.addImage(imgData, 'JPEG', 0, position, imgWidth, imgHeight);
                    heightLeft -= pageHeight;
                }

                doc.save(`Enquiry_OMS_${ORDER_DATA.orderId}.pdf`);

            } catch (err) { alert('Enquiry synchronization failed: ' + err.message); }
            finally { btn.innerHTML = originalText; }
        }
    </script>

    @include('pages._cracker-canvas')

@endsection
