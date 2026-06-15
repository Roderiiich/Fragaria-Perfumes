<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $perfume->nombre }} - Fragaria</title>
    <style>
        /* --- Estilos Generales --- */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        body {
            background-color: #f3f4f6;
            color: #1f2937;
            padding: 40px 0;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .back-link {
            display: inline-block;
            text-decoration: none;
            color: #4b5563;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 20px;
        }
        .back-link:hover { color: #111827; }

        /* --- Ficha Principal del Perfume --- */
        .perfume-main-card {
            background-color: #ffffff;
            border-radius: 16px;
            border: 1px solid #e5e7eb;
            padding: 24px;
            display: flex;
            gap: 28px;
            margin-bottom: 30px;
        }

        .perfume-img-container {
            width: 240px;
            height: 240px;
            border-radius: 12px;
            overflow: hidden;
            background-color: #f9fafb;
        }

        .perfume-img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .perfume-details {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .perfume-title {
            font-size: 28px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 4px;
        }

        .perfume-subtitle {
            font-size: 14px;
            color: #6b7280;
            margin-bottom: 16px;
        }

        .perfume-description {
            font-size: 14px;
            color: #4b5563;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        /* Rejilla de Métricas de Rendimiento */
        .metrics-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .metric-box {
            background-color: #f9fafb;
            border: 1px solid #f3f4f6;
            padding: 12px 16px;
            border-radius: 8px;
        }

        .metric-label {
            font-size: 11px;
            color: #9ca3af;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 0.5px;
            margin-bottom: 2px;
        }

        .metric-value {
            font-size: 14px;
            font-weight: 700;
            color: #111827;
        }

        /* --- Secciones de Reseñas --- */
        .section-title {
            font-size: 20px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 16px;
            margin-top: 30px;
        }

        .review-card {
            background-color: #ffffff;
            border-radius: 16px;
            border: 1px solid #e5e7eb;
            padding: 24px;
            margin-bottom: 16px;
            position: relative;
        }

        /* Distintivo sutil para tu propia reseña */
        .review-card.my-review {
            border: 1px solid #bfa0a0; /* Contorno ligeramente marcado */
        }

        .review-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 12px;
        }

        .user-nickname {
            font-weight: 700;
            font-size: 14px;
            color: #111827;
        }

        .review-date {
            font-size: 12px;
            color: #9ca3af;
            margin-top: 2px;
        }

        .stars {
            color: #facc15;
            font-size: 13px;
        }

        .review-comment {
            font-size: 14px;
            color: #374151;
            line-height: 1.5;
            margin-bottom: 12px;
        }

        .review-meta-tags {
            font-size: 12px;
            color: #6b7280;
        }

        .review-meta-tags strong {
            color: #111827;
        }

        /* Botones de Acción (Editar/Eliminar) */
        .review-actions {
            display: flex;
            gap: 8px;
            margin-top: 16px;
        }

        .btn {
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            border: none;
        }

        .btn-edit {
            background-color: #000000;
            color: #ffffff;
        }
        .btn-edit:hover { background-color: #1f2937; }

        .btn-delete {
            background-color: #f87171;
            color: #ffffff;
        }
        .btn-delete:hover { background-color: #ef4444; }

        .no-reviews-msg {
            font-size: 14px;
            color: #6b7280;
            background: white;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            border: 1px solid #e5e7eb;
        }
    </style>
</head>
<body>

    <div class="container">
        
        <a href="{{ route('perfumes.index') }}" class="back-link">← Volver al catálogo</a>

        <div class="perfume-main-card">
            <div class="perfume-img-container">
                <img src="https://picsum.photos/id/{{ ($perfume->id * 10) % 100 }}/300/300" alt="{{ $perfume->nombre }}">
            </div>
            <div class="perfume-details">
                <h1 class="perfume-title">{{ $perfume->nombre }}</h1>
                <div class="perfume-subtitle">{{ $perfume->brand->nombre }} • {{ $perfume->category->nombre }}</div>
                
                <p class="perfume-description">
                    {{ $perfume->descripcion ?? 'Fragancia moderna y sofisticada con notas frescas y especiadas. Destaca por su gran versatilidad y excelente rendimiento.' }}
                </p>

                <div class="metrics-grid">
                    <div class="metric-box">
                        <div class="metric-label">Duración promedio</div>
                        <div class="metric-value">{{ $perfume->duracion_promedio ? round($perfume->duracion_promedio) . ' horas' : '8 horas' }}</div>
                    </div>
                    <div class="metric-box">
                        <div class="metric-label">Proyección</div>
                        <div class="metric-value">{{ round($perfume->proyeccion_promedio) == 3 ? 'Intenso' : (round($perfume->proyeccion_promedio) == 2 ? 'Moderado' : 'Leve') }}</div>
                    </div>
                    <div class="metric-box">
                        <div class="metric-label">Calificación</div>
                        <div class="metric-value">{{ $perfume->calificacion_promedio ? number_format($perfume->calificacion_promedio, 1) : '4.5' }} / 5 ⭐</div>
                    </div>
                    <div class="metric-box">
                        <div class="metric-label">Total reseñas</div>
                        <div class="metric-value">{{ $perfume->total_resenas ?? 0 }} reseñas</div>
                    </div>
                </div>
            </div>
        </div>

        @if($myReview)
            <h2 class="section-title">Tu reseña</h2>
            <div class="review-card my-review">
                <div class="review-header">
                    <div>
                        <div class="user-nickname">@ {{ $myReview->user->nickname ?? 'tu_usuario' }}</div>
                        <div class="review-date">{{ $myReview->created_at->translatedFormat('d F Y') }}</div>
                    </div>
                    <div class="stars">{!! str_repeat('★', $myReview->calificacion) !!}{!! str_repeat('☆', 5 - $myReview->calificacion) !!}</div>
                </div>
                <p class="review-comment">{{ $myReview->comentario }}</p>
                <div class="review-meta-tags">
                    <span>Duración: <strong>{{ $myReview->duracion }} horas</strong></span> &nbsp;|&nbsp;
                    <span>Proyección: <strong>{{ $myReview->proyeccion == 3 ? 'Intenso' : ($myReview->proyeccion == 2 ? 'Moderado' : 'Leve') }}</strong></span>
                </div>
                <div class="review-actions">
                    <a href="#" class="btn btn-edit">Editar reseña</a>
                    <a href="#" class="btn btn-delete">Eliminar reseña</a>
                </div>
            </div>
        @endif

        <h2 class="section-title">Reseñas de usuarios</h2>
        @forelse($otherReviews as $review)
            <div class="review-card">
                <div class="review-header">
                    <div>
                        <div class="user-nickname">@ {{ $review->user->nickname ?? 'fraglover' }}</div>
                        <div class="review-date">{{ $review->created_at->translatedFormat('d F Y') }}</div>
                    </div>
                    <div class="stars">{!! str_repeat('★', $review->calificacion) !!}{!! str_repeat('☆', 5 - $review->calificacion) !!}</div>
                </div>
                <p class="review-comment">{{ $review->comentario }}</p>
                <div class="review-meta-tags">
                    <span>Duración: <strong>{{ $review->duracion }} horas</strong></span> &nbsp;|&nbsp;
                    <span>Proyección: <strong>{{ $review->proyeccion == 3 ? 'Intenso' : ($review->proyeccion == 2 ? 'Moderado' : 'Leve') }}</strong></span>
                </div>
            </div>
        @empty
            <div class="no-reviews-msg">Aún no hay más reseñas de este perfume. ¡Sé el primero en aportar!</div>
        @endforelse

    </div>

</body>
</html>