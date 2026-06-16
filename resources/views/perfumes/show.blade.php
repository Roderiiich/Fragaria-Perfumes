<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $perfume->nombre }} - Fragaria</title>
    <style>
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
            width: 280px;
            height: 280px;
            border-radius: 12px;
            overflow: hidden;
            background-color: #f3f4f6;
            flex-shrink: 0;
        }

        .perfume-img-container img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            object-position: center;
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

        .review-card.my-review {
            border: 1px solid #bfa0a0;
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

        /* --- Nuevos estilos para formularios de reseña --- */
        .review-form-card {
            background-color: #ffffff;
            border-radius: 16px;
            border: 1px solid #e5e7eb;
            padding: 24px;
            margin-bottom: 16px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 16px;
        }

        .form-group label {
            font-size: 13px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 6px;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            padding: 10px 14px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            color: #1f2937;
            outline: none;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            border-color: #111827;
            box-shadow: 0 0 0 3px rgba(17,24,39,0.05);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 80px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-bottom: 16px;
        }

        .form-row .form-group {
            margin-bottom: 0;
        }

        .star-selector {
            display: flex;
            flex-direction: row-reverse;
            width: fit-content;
            gap: 4px;
        }

        .star-selector input[type="radio"] {
            display: none;
        }

        .star-selector label {
            font-size: 28px;
            color: #d1d5db;
            cursor: pointer;
        }

        .star-selector label:hover,
        .star-selector label:hover ~ label,
        .star-selector input:checked ~ label {
            color: #facc15;
        }

        .error-msg {
            color: #ef4444;
            font-size: 12px;
            margin-top: 4px;
            font-weight: 500;
        }

        .btn-submit {
            background-color: #1f2937;
            color: #ffffff;
            border: none;
            padding: 11px 24px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-submit:hover { background-color: #111827; }

        .edit-form-wrapper {
            display: none;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
        }

        .alert-success {
            background: #d1fae5;
            color: #065f46;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert-login {
            background: #eff6ff;
            color: #1d4ed8;
            padding: 16px 20px;
            border-radius: 12px;
            margin-top: 30px;
            font-size: 14px;
            border: 1px solid #bfdbfe;
            text-align: center;
        }

        .alert-login a {
            color: #1d4ed8;
            font-weight: 600;
        }
    </style>
</head>
<body>

    <div class="container">

        <a href="{{ route('perfumes.index') }}" class="back-link">← Volver al catálogo</a>

        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <div class="perfume-main-card">
            <div class="perfume-img-container">
                <img src="{{ asset($perfume->imagen) }}" alt="{{ $perfume->nombre }}">
            </div>
            <div class="perfume-details">
                <h1 class="perfume-title">{{ $perfume->nombre }}</h1>
                <div class="perfume-subtitle">{{ $perfume->brand->nombre }} • {{ $perfume->category->nombre }}</div>

                <p class="perfume-description">
                    {{ $perfume->descripcion }}
                </p>

                <div class="metrics-grid">
                    <div class="metric-box">
                        <div class="metric-label">Duración promedio</div>
                        <div class="metric-value">{{ $perfume->duracion_promedio ? round($perfume->duracion_promedio) . ' horas' : 'Sin reseñas' }}</div>
                    </div>
                    <div class="metric-box">
                        <div class="metric-label">Proyección</div>
                        @php $proy = round($perfume->proyeccion_promedio ?? 0); @endphp
                        <div class="metric-value">{{ $proy == 3 ? 'Intenso' : ($proy == 2 ? 'Moderado' : ($proy == 1 ? 'Leve' : 'Sin reseñas')) }}</div>
                    </div>
                    <div class="metric-box">
                        <div class="metric-label">Calificación</div>
                        <div class="metric-value">{{ $perfume->calificacion_promedio ? number_format($perfume->calificacion_promedio, 1) . ' / 5 ⭐' : 'Sin reseñas' }}</div>
                    </div>
                    <div class="metric-box">
                        <div class="metric-label">Total reseñas</div>
                        <div class="metric-value">{{ $perfume->total_resenas ?? 0 }} reseñas</div>
                    </div>
                </div>
            </div>
        </div>

        @auth
            @if($myReview)
                {{-- Mi reseña existente --}}
                <h2 class="section-title">Tu reseña</h2>
                <div class="review-card my-review">
                    <div class="review-header">
                        <div>
                            <div class="user-nickname">@ {{ $myReview->user->nickname }}</div>
                            <div class="review-date">{{ $myReview->created_at->format('d/m/Y') }}</div>
                        </div>
                        <div class="stars">{!! str_repeat('★', $myReview->calificacion) !!}{!! str_repeat('☆', 5 - $myReview->calificacion) !!}</div>
                    </div>
                    <p class="review-comment">{{ $myReview->comentario }}</p>
                    <div class="review-meta-tags">
                        <span>Duración: <strong>{{ $myReview->duracion }} horas</strong></span> &nbsp;|&nbsp;
                        <span>Proyección: <strong>{{ $myReview->proyeccion == 3 ? 'Intenso' : ($myReview->proyeccion == 2 ? 'Moderado' : 'Leve') }}</strong></span>
                    </div>
                    <div class="review-actions">
                        <button onclick="var f=document.getElementById('edit-form');f.style.display=f.style.display==='none'?'block':'none'" class="btn btn-edit">Editar reseña</button>
                        <form method="POST" action="{{ route('reviews.destroy', $myReview->id) }}" onsubmit="return confirm('¿Eliminar tu reseña?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">Eliminar reseña</button>
                        </form>
                    </div>

                    {{-- Formulario edición (oculto) --}}
                    <div id="edit-form" class="edit-form-wrapper">
                        <form method="POST" action="{{ route('reviews.update', $myReview->id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label>Calificación</label>
                                <div class="star-selector">
                                    @for($i = 5; $i >= 1; $i--)
                                        <input type="radio" name="calificacion" id="edit-star{{ $i }}" value="{{ $i }}" {{ $myReview->calificacion == $i ? 'checked' : '' }}>
                                        <label for="edit-star{{ $i }}">★</label>
                                    @endfor
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Comentario</label>
                                <textarea name="comentario" required>{{ $myReview->comentario }}</textarea>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label>Duración (horas)</label>
                                    <input type="number" name="duracion" min="1" max="24" value="{{ $myReview->duracion }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Proyección</label>
                                    <select name="proyeccion" required>
                                        <option value="1" {{ $myReview->proyeccion == 1 ? 'selected' : '' }}>Leve</option>
                                        <option value="2" {{ $myReview->proyeccion == 2 ? 'selected' : '' }}>Moderado</option>
                                        <option value="3" {{ $myReview->proyeccion == 3 ? 'selected' : '' }}>Intenso</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn-submit">Guardar cambios</button>
                        </form>
                    </div>
                </div>

            @else
                {{-- Formulario nueva reseña --}}
                <h2 class="section-title">Escribir una reseña</h2>
                <div class="review-form-card">
                    <form method="POST" action="{{ route('reviews.store', $perfume->id) }}">
                        @csrf
                        <div class="form-group">
                            <label>Calificación</label>
                            <div class="star-selector">
                                @for($i = 5; $i >= 1; $i--)
                                    <input type="radio" name="calificacion" id="star{{ $i }}" value="{{ $i }}" {{ old('calificacion') == $i ? 'checked' : '' }}>
                                    <label for="star{{ $i }}">★</label>
                                @endfor
                            </div>
                            @error('calificacion') <span class="error-msg">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label>Comentario</label>
                            <textarea name="comentario" placeholder="Comparte tu experiencia con este perfume..." required>{{ old('comentario') }}</textarea>
                            @error('comentario') <span class="error-msg">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label>Duración (horas)</label>
                                <input type="number" name="duracion" min="1" max="24" value="{{ old('duracion') }}" placeholder="Ej: 8" required>
                                @error('duracion') <span class="error-msg">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label>Proyección</label>
                                <select name="proyeccion" required>
                                    <option value="">Seleccionar...</option>
                                    <option value="1" {{ old('proyeccion') == 1 ? 'selected' : '' }}>Leve</option>
                                    <option value="2" {{ old('proyeccion') == 2 ? 'selected' : '' }}>Moderado</option>
                                    <option value="3" {{ old('proyeccion') == 3 ? 'selected' : '' }}>Intenso</option>
                                </select>
                                @error('proyeccion') <span class="error-msg">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn-submit">Publicar reseña</button>
                    </form>
                </div>
            @endif

        @else
            <div class="alert-login">
                <a href="{{ route('login') }}">Inicia sesión</a> para escribir una reseña sobre este perfume.
            </div>
        @endauth

        {{-- Reseñas de otros usuarios --}}
        <h2 class="section-title">Reseñas de usuarios</h2>
        @forelse($otherReviews as $review)
            <div class="review-card">
                <div class="review-header">
                    <div>
                        <div class="user-nickname">@ {{ $review->user->nickname ?? 'fraglover' }}</div>
                        <div class="review-date">{{ $review->created_at->format('d/m/Y') }}</div>
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