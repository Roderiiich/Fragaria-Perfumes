<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fragaria - Catálogo de Perfumes</title>
    <style>
        /* --- Estilos Base y Variables de Color --- */
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
            min-height: 100vh;
        }

        /* --- Barra Lateral (Sidebar) --- */
        .sidebar {
            width: 280px;
            background-color: #ffffff;
            padding: 30px 24px;
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            border-right: 1px solid #e5e7eb;
            overflow-y: auto;
        }

        .sidebar-logo {
            font-size: 24px;
            font-weight: 800;
            margin-bottom: 24px;
            color: #000000;
        }

        /* Tarjeta de Usuario */
        .user-card {
            background-color: #f3f4f6;
            padding: 12px 16px;
            border-radius: 12px;
            margin-bottom: 24px;
        }

        .user-nickname {
            display: block;
            font-weight: 700;
            font-size: 15px;
            color: #111827;
        }

        .user-name {
            display: block;
            font-size: 12px;
            color: #6b7280;
            margin-top: 2px;
        }

        /* Buscador */
        .search-box {
            margin-bottom: 24px;
        }

        .search-box input {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
        }

        /* Grupos de Filtros (Radio Buttons) */
        .filter-group {
            margin-bottom: 24px;
        }

        .filter-group h3 {
            font-size: 14px;
            font-weight: 700;
            color: #374151;
            margin-bottom: 12px;
        }

        .filter-option {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
            font-size: 14px;
            color: #4b5563;
            cursor: pointer;
        }

        .filter-option input {
            margin-right: 8px;
            accent-color: #2563eb;
        }

        /* --- Contenedor de Botones de Autenticación (Sección Inferior) --- */
        .sidebar-auth-footer {
            margin-top: auto;
            padding-top: 20px;
        }

        /* Botón Cerrar Sesión */
        .btn-logout {
            width: 100%;
            background-color: #1f2937;
            color: #ffffff;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            display: block;
        }

        .btn-logout:hover {
            background-color: #111827;
        }

        /* Botones de Invitados (Login y Registro paralelos) */
        .guest-buttons-container {
            display: flex;
            gap: 10px;
            width: 100%;
        }

        .btn-guest {
            flex: 1;
            padding: 11px 8px;
            font-size: 13px;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .btn-guest-login {
            background-color: #ffffff;
            color: #374151;
            border: 1px solid #d1d5db;
        }

        .btn-guest-login:hover {
            background-color: #f9fafb;
            border-color: #111827;
            color: #111827;
        }

        .btn-guest-register {
            background-color: #111827;
            color: #ffffff;
            border: 1px solid #111827;
        }

        .btn-guest-register:hover {
            background-color: #374151;
            border-color: #374151;
        }

        /* --- Contenedor Principal de Contenido --- */
        .main-content {
            margin-left: 280px;
            flex: 1;
            padding: 40px;
            width: calc(100% - 280px);
        }

        .main-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 24px;
            color: #111827;
        }

        /* --- Rejilla de Perfumes (2 Columnas) --- */
        .perfume-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(480px, 1fr));
            gap: 24px;
        }

        /* Tarjeta Horizontal */
        .perfume-card {
            background-color: #ffffff;
            border-radius: 16px;
            border: 1px solid #e5e7eb;
            overflow: hidden;
            display: flex;
            height: 220px;
            box-shadow: 0 1px 2px rgba(0,0,0,0.02);
        }

        .card-image-container {
            width: 35%;
            background-color: #f9fafb;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .card-image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .card-info {
            width: 65%;
            padding: 20px;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .brand-lbl {
            font-size: 11px;
            color: #9ca3af;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .perfume-title {
            font-size: 18px;
            font-weight: 700;
            color: #111827;
            margin-top: 2px;
        }

        .category-badge {
            display: inline-block;
            align-self: flex-start;
            background-color: #f3f4f6;
            color: #4b5563;
            font-size: 11px;
            font-weight: 600;
            padding: 2px 10px;
            border-radius: 20px;
            margin: 8px 0;
        }

        .perfume-desc {
            font-size: 13px;
            color: #6b7280;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            margin-bottom: 12px;
            height: 38px;
        }

        .perfume-meta {
            font-size: 13px;
            color: #4b5563;
            margin-bottom: 12px;
        }

        .perfume-meta strong {
            color: #111827;
        }

        .meta-separator {
            margin: 0 8px;
            color: #d1d5db;
        }

        /* Estrellas de Reseña */
        .perfume-rating {
            display: flex;
            align-items: center;
            margin-top: auto;
        }

        .stars {
            color: #facc15;
            font-size: 14px;
            letter-spacing: 1px;
        }

        .reviews-count {
            font-size: 12px;
            color: #9ca3af;
            margin-left: 6px;
        }

        /* Botón Ver Detalle (Arriba a la derecha) */
        .btn-detail {
            position: absolute;
            top: 20px;
            right: 20px;
            border: 1px solid #e5e7eb;
            background-color: #ffffff;
            color: #4b5563;
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 500;
            text-decoration: none;
            box-shadow: 0 1px 2px rgba(0,0,0,0.05);
        }

        .btn-detail:hover {
            background-color: #f9fafb;
            color: #111827;
        }

        .no-results {
            grid-column: 1 / -1;
            text-align: center;
            padding: 40px;
            background: white;
            border-radius: 12px;
            color: #6b7280;
        }
    </style>
</head>
<body>

    <aside class="sidebar">
        <h2 class="sidebar-logo">Fragaria</h2>
        
        <?php if(auth()->guard()->check()): ?>
            <div class="user-card">
                <span class="user-nickname"><?php echo e(auth()->user()->nickname); ?></span>
                <span class="user-name"><?php echo e(auth()->user()->nombres); ?> <?php echo e(auth()->user()->apellidos); ?></span>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('perfumes.index')); ?>" method="GET" id="filterForm">
            
            <div class="search-box">
                <input type="text" name="search" placeholder="Buscar perfume..." value="<?php echo e(request('search')); ?>" onkeypress="if(event.key === 'Enter') this.form.submit();">
            </div>

            <div class="filter-group">
                <h3>Filtrar por marca</h3>
                <label class="filter-option">
                    <input type="radio" name="brand_id" value="" <?php echo e(request('brand_id') == '' ? 'checked' : ''); ?> onchange="document.getElementById('filterForm').submit();">
                    Todas
                </label>
                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <label class="filter-option">
                        <input type="radio" name="brand_id" value="<?php echo e($brand->id); ?>" <?php echo e(request('brand_id') == $brand->id ? 'checked' : ''); ?> onchange="document.getElementById('filterForm').submit();">
                        <?php echo e($brand->nombre); ?>

                    </label>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="filter-group">
                <h3>Filtrar por familia olfativa</h3>
                <label class="filter-option">
                    <input type="radio" name="category_id" value="" <?php echo e(request('category_id') == '' ? 'checked' : ''); ?> onchange="document.getElementById('filterForm').submit();">
                    Todas
                </label>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <label class="filter-option">
                        <input type="radio" name="category_id" value="<?php echo e($category->id); ?>" <?php echo e(request('category_id') == $category->id ? 'checked' : ''); ?> onchange="document.getElementById('filterForm').submit();">
                        <?php echo e($category->nombre); ?>

                    </label>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </form>

        <div class="sidebar-auth-footer">
            <?php if(auth()->guard()->check()): ?>
                <form action="<?php echo e(route('logout')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn-logout">Cerrar sesión</button>
                </form>
            <?php else: ?>
                <div class="guest-buttons-container">
                    <a href="<?php echo e(route('login')); ?>" class="btn-guest btn-guest-login">Iniciar sesión</a>
                    <a href="<?php echo e(route('register')); ?>" class="btn-guest btn-guest-register">Registrarse</a>
                </div>
            <?php endif; ?>
        </div>
    </aside>

    <main class="main-content">
        <h1 class="main-title">Catálogo de perfumes</h1>

        <div class="perfume-grid">
            <?php $__empty_1 = true; $__currentLoopData = $perfumes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $perfume): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="perfume-card">
                    <div class="card-image-container">
                        <img src="https://picsum.photos/id/<?php echo e(($perfume->id * 10) % 100); ?>/200/300" alt="<?php echo e($perfume->nombre); ?>">
                    </div>

                    <div class="card-info">
                        <span class="brand-lbl"><?php echo e($perfume->brand->nombre); ?></span>
                        <h2 class="perfume-title"><?php echo e($perfume->nombre); ?></h2>
                        
                        <span class="category-badge"><?php echo e($perfume->category->nombre); ?></span>
                        
                        <p class="perfume-desc">
                            <?php echo e($perfume->descripcion ?? 'Fragancia elegante, sofisticada y equilibrada ideal para marcar presencia en cualquier ocasión.'); ?>

                        </p>
                        
                        <div class="perfume-meta">
                            <span>Duración: <strong><?php echo e($perfume->duracion_promedio ? round($perfume->duracion_promedio) . ' horas' : '7 horas'); ?></strong></span>
                            <span class="meta-separator">|</span>
                            <span>Proyección: <strong><?php echo e(round($perfume->proyeccion_promedio) == 3 ? 'Intenso' : (round($perfume->proyeccion_promedio) == 2 ? 'Moderado' : 'Leve')); ?></strong></span>
                        </div>

                        <div class="perfume-rating">
                            <span class="stars">
                                <?php
                                    $rating = $perfume->calificacion_promedio ? round($perfume->calificacion_promedio) : 4;
                                ?>
                                <?php echo str_repeat('★', $rating); ?><?php echo str_repeat('☆', 5 - $rating); ?>

                            </span>
                            <span class="reviews-count">(<?php echo e($perfume->total_resenas ?? rand(50, 450)); ?> reviews)</span>
                        </div>

                        <a href="<?php echo e(route('perfumes.show', $perfume->id)); ?>" class="btn-detail">Ver detalle</a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="no-results">
                    No encontramos perfumes que coincidan con los filtros seleccionados.
                </div>
            <?php endif; ?>
        </div>
    </main>

</body>
</html><?php /**PATH C:\Users\Rich\Desktop\fragaria\resources\views/perfumes/index.blade.php ENDPATH**/ ?>