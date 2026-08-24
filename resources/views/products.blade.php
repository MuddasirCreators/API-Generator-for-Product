@extends('layouts.app')

@section('title', 'API Hub - Products')

@section('content')
{{-- SweetAlert2 CDN --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="api-page">

    {{-- ====================== HEADER + HERO ====================== --}}
    <section class="top-section">

        <header class="api-header">
            {{-- empty --}}
        </header>

        <section class="hero">
            <div class="hero-content">

                <div class="brand">
                    <div class="brand-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="16 18 22 12 16 6"></polyline>
                            <polyline points="8 6 2 12 8 18"></polyline>
                        </svg>
                    </div>
                    <div>
                        <div class="brand-name">API <span>HUB</span></div>
                        <div class="brand-tagline">Powerful APIs. Infinite Possibilities.</div>
                    </div>
                </div>

                <h1>
                    One Endpoint.<br>
                    <span>All</span> Products.
                </h1>

                <p>
                    Use a single API endpoint to access all our products
                    and integrate seamlessly into your application.
                </p>

                <div class="hero-actions">
                    {{-- ALL PRODUCTS --}}
                    <a href="javascript:void(0)"
                       class="primary-btn"
                       onclick="copyAndNotify('{{ url('/api/v1/products') }}')">
                        <svg class="btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14"></path>
                            <path d="M12 5l7 7-7 7"></path>
                        </svg>
                        GET ALL PRODUCTS API
                        <svg class="btn-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14"></path>
                            <path d="M12 5l7 7-7 7"></path>
                        </svg>
                    </a>

                    <div class="endpoint-box">
                        <span class="method">GET</span>
                        <code>/api/v1/products</code>
                        <button type="button"
                                onclick="copyAndNotify('{{ url('/api/v1/products') }}')"
                                title="Copy endpoint">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="hero-visual">
                <img src="{{ asset('images/header1.png') }}" alt="API Hub" class="hero-image">
            </div>
        </section>
    </section>

    {{-- ====================== AVAILABLE APIs ====================== --}}
    <section class="api-section">
        <div class="section-heading">
            <div>
                <h2>Available APIs</h2>
                <div class="heading-line"></div>
                <p>Choose any API and start integrating with ease.</p>
            </div>

            <div class="api-count">
                <span class="count-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                        <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                        <line x1="12" y1="22.08" x2="12" y2="12"></line>
                    </svg>
                </span>
                <div>
                    <small>Total APIs</small>
                    <strong>{{ count($products) }}</strong>
                </div>
            </div>
        </div>

        <div class="api-grid">
            @forelse($products as $index => $product)
                @php
                    $colors = [
                        [
                            'class' => 'red',
                            'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>'
                        ],
                        [
                            'class' => 'purple',
                            'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>'
                        ],
                        [
                            'class' => 'blue',
                            'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"></path><polyline points="16 14 12 10 8 14"></polyline><line x1="12" y1="10" x2="12" y2="20"></line></svg>'
                        ],
                        [
                            'class' => 'orange',
                            'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2zm0 8h2v2h-2z"/></svg>'
                        ],
                    ];
                    $color = $colors[$index % count($colors)];

                    $fullEndpoint   = url('/api/v1/products/' . $product['id']);
                    $displayEndpoint = '/api/v1/products/' . $product['id'];
                @endphp

                <div class="api-card {{ $color['class'] }}">
                    <div class="card-top">
                        <div class="api-icon">
                            {!! $color['icon'] !!}
                        </div>
                        <span class="api-number">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                    </div>

                    <h3>{{ $product['name'] }}</h3>
                    <p class="card-description">{{ $product['description'] }}</p>

                    <div class="card-detail">
                        <span>Category</span>
                        <strong class="category">{{ $product['category'] ?? 'API Development' }}</strong>
                    </div>

                    <div class="card-detail price-row">
                        <span>Price</span>
                        <strong>${{ number_format((float) $product['price'], 2) }}</strong>
                    </div>

                    <div class="endpoint-label">Endpoint</div>

                    <div class="card-endpoint">
                        <code>{{ $displayEndpoint }}</code>
                        <button type="button"
                                onclick="copyAndNotify('{{ $fullEndpoint }}')"
                                title="Copy endpoint">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                            </svg>
                        </button>
                    </div>

                    {{-- Single Product GET API - NO REDIRECT --}}
                    <a href="javascript:void(0)"
                       class="get-api-btn"
                       onclick="copyAndNotify('{{ $fullEndpoint }}')">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="22" y1="2" x2="11" y2="13"></line>
                            <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                        </svg>
                        GET API
                    </a>
                </div>
            @empty
                <div class="empty-state">
                    <h2>No Products Found</h2>
                    <p>The API did not return any products.</p>
                    <a href="{{ url('/') }}" class="primary-btn">Try Another API</a>
                </div>
            @endforelse
        </div>
    </section>

    {{-- ====================== FEATURES ====================== --}}
    <section class="features">
        <div class="feature">
            <div class="feature-icon red-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                    <path d="M9 12l2 2 4-4"></path>
                </svg>
            </div>
            <div>
                <h4>Secure & Reliable</h4>
                <p>All APIs are secure and built with best practices.</p>
            </div>
        </div>

        <div class="feature">
            <div class="feature-icon purple-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                </svg>
            </div>
            <div>
                <h4>Fast Performance</h4>
                <p>Optimized for speed and high performance.</p>
            </div>
        </div>

        <div class="feature">
            <div class="feature-icon blue-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="16 18 22 12 16 6"></polyline>
                    <polyline points="8 6 2 12 8 18"></polyline>
                </svg>
            </div>
            <div>
                <h4>Easy Integration</h4>
                <p>Simple REST API structure for quick integration.</p>
            </div>
        </div>

        <div class="feature">
            <div class="feature-icon orange-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                    <polyline points="14 2 14 8 20 8"></polyline>
                    <line x1="16" y1="13" x2="8" y2="13"></line>
                    <line x1="16" y1="17" x2="8" y2="17"></line>
                    <polyline points="10 9 9 9 8 9"></polyline>
                </svg>
            </div>
            <div>
                <h4>Well Documented</h4>
                <p>Complete documentation and example responses.</p>
            </div>
        </div>
    </section>

    <footer class="api-footer">
        Laravel API Consumer &bull; Product Client
    </footer>
</div>

<script>
/**
 * Copy endpoint to clipboard and show SweetAlert
 * No redirect / no new tab
 */
function copyAndNotify(url) {
    navigator.clipboard.writeText(url)
        .then(() => {
            Swal.fire({
                icon: 'success',
                title: 'Copied!',
                html: `
                    <p style="margin-bottom:12px;">Endpoint copied to clipboard</p>
                    <code style="background:#f3f4f6;padding:8px 14px;border-radius:8px;font-size:13px;display:inline-block;word-break:break-all;">${url}</code>
                `,
                confirmButtonText: 'OK',
                confirmButtonColor: '#e11d48',
                timer: 2800,
                timerProgressBar: true
            });
        })
        .catch(() => {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Failed to copy the endpoint',
                confirmButtonColor: '#e11d48'
            });
        });
}
</script>
@endsection