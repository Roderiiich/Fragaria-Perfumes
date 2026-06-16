<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Fragaria</title>
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
            padding: 20px;
        }

        /* --- Tarjeta de Contenedor --- */
        .auth-card {
            background-color: #ffffff;
            width: 100%;
            max-width: 400px;
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

        /* --- Grupos del Formulario --- */
        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
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

        /* --- Opciones Extras (Remember & Forgot) --- */
        .options-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 26px;
        }

        .remember-label {
            display: flex;
            align-items: center;
            font-size: 13px;
            color: #4b5563;
            cursor: pointer;
            user-select: none;
        }

        .remember-label input {
            margin-right: 8px;
            width: 16px;
            height: 16px;
            accent-color: #1f2937;
            cursor: pointer;
        }

        .forgot-link {
            font-size: 13px;
            color: #4b5563;
            text-decoration: none;
            font-weight: 500;
        }

        .forgot-link:hover {
            color: #111827;
            text-decoration: underline;
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
        <p class="auth-subtitle">Inicia sesión para gestionar tus perfumes</p>

        <form method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo csrf_field(); ?>

            <div class="form-group">
                <label class="form-label" for="email">Correo electrónico</label>
                <input class="form-input" id="email" type="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus placeholder="tu@correo.com">
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error-msg"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
                <label class="form-label" for="password">Contraseña</label>
                <input class="form-input" id="password" type="password" name="password" required placeholder="••••••••">
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error-msg"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="options-row">
                <label class="remember-label">
                    <input type="checkbox" name="remember">
                    <span>Recordarme</span>
                </label>
                <?php if(Route::has('password.request')): ?>
                    <a class="forgot-link" href="<?php echo e(route('password.request')); ?>">¿Olvidaste tu contraseña?</a>
                <?php endif; ?>
            </div>

            <button type="submit" class="btn-submit">Iniciar sesión</button>
        </form>

        <div class="auth-footer">
            ¿No tienes cuenta? <a href="<?php echo e(route('register')); ?>">Regístrate aquí</a>
        </div>
    </div>

</body>
</html><?php /**PATH C:\xampp\htdocs\fragaria\resources\views/perfumes/login.blade.php ENDPATH**/ ?>