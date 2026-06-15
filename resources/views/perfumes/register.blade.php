<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Fragaria</title>
    <style>
        /* --- Estilos Base --- */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        body {
            background-color: #f3f4f6;
            color: #1f2937;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 40px 20px;
        }

        /* --- Tarjeta de Contenedor --- */
        .auth-card {
            background-color: #ffffff;
            width: 100%;
            max-width: 500px;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            border: 1px solid #e5e7eb;
        }

        .auth-logo {
            font-size: 32px;
            font-weight: 800;
            color: #000000;
            text-align: center;
            margin-bottom: 6px;
            letter-spacing: -0.5px;
        }

        .auth-subtitle {
            font-size: 14px;
            color: #6b7280;
            text-align: center;
            margin-bottom: 32px;
        }

        /* --- Formulario y Cuadrícula --- */
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-bottom: 18px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
            margin-bottom: 18px;
        }

        .form-label {
            font-size: 13px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 6px;
        }

        .form-input {
            width: 100%;
            padding: 11px 14px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            color: #1f2937;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-input:focus {
            border-color: #111827;
            box-shadow: 0 0 0 3px rgba(17, 24, 39, 0.05);
        }

        /* Mensajes de Error de Laravel */
        .error-msg {
            color: #ef4444;
            font-size: 12px;
            margin-top: 5px;
            font-weight: 500;
        }

        /* --- Botón de Envío --- */
        .btn-submit {
            width: 100%;
            background-color: #1f2937;
            color: #ffffff;
            border: none;
            padding: 13px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
            margin-top: 12px;
        }

        .btn-submit:hover {
            background-color: #111827;
        }

        /* --- Enlace Inferior --- */
        .auth-footer {
            text-align: center;
            margin-top: 28px;
            font-size: 14px;
            color: #6b7280;
        }

        .auth-footer a {
            color: #111827;
            font-weight: 600;
            text-decoration: none;
        }

        .auth-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="auth-card">
        <h1 class="auth-logo">Fragaria</h1>
        <p class="auth-subtitle">Crea una cuenta para explorar el catálogo</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label" for="nombres">Nombres</label>
                    <input class="form-input" id="nombres" type="text" name="nombres" value="{{ old('nombres') }}" required autofocus placeholder="César">
                    @error('nombres') <span class="error-msg">{{ $message }}</span> @enderror
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="apellidos">Apellidos</label>
                    <input class="form-input" id="apellidos" type="text" name="apellidos" value="{{ old('apellidos') }}" required placeholder="Mora">
                    @error('apellidos') <span class="error-msg">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group full-width">
                <label class="form-label" for="nickname">Nickname de usuario (Público)</label>
                <input class="form-input" id="nickname" type="text" name="nickname" value="{{ old('nickname') }}" required placeholder="ejemplo: @cesarmora">
                @error('nickname') <span class="error-msg">{{ $message }}</span> @enderror
            </div>

            <div class="form-group full-width">
                <label class="form-label" for="email">Correo electrónico</label>
                <input class="form-input" id="email" type="email" name="email" value="{{ old('email') }}" required placeholder="tu@correo.com">
                @error('email') <span class="error-msg">{{ $message }}</span> @enderror
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label" for="password">Contraseña</label>
                    <input class="form-input" id="password" type="password" name="password" required placeholder="••••••••">
                    @error('password') <span class="error-msg">{{ $message }}</span> @enderror
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="password_confirmation">Confirmar contraseña</label>
                    <input class="form-input" id="password_confirmation" type="password" name="password_confirmation" required placeholder="••••••••">
                </div>
            </div>

            <button type="submit" class="btn-submit">Crear cuenta</button>
        </form>

        <div class="auth-footer">
            ¿Ya tienes una cuenta? <a href="{{ route('login') }}">Inicia sesión</a>
        </div>
    </div>

</body>
</html>