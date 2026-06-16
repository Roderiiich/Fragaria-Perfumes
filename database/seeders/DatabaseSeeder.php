<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Perfume;
use App\Models\Review;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::factory(10)->create();

        $dior     = Brand::create(['nombre' => 'Dior']);
        $chanel   = Brand::create(['nombre' => 'Chanel']);
        $versace  = Brand::create(['nombre' => 'Versace']);
        $carolina = Brand::create(['nombre' => 'Carolina Herrera']);
        $ysl      = Brand::create(['nombre' => 'Yves Saint Laurent']);

        $amaderado = Category::create(['nombre' => 'Amaderado']);
        $oriental  = Category::create(['nombre' => 'Oriental']);
        $citrico   = Category::create(['nombre' => 'Citrico']);
        $dulce     = Category::create(['nombre' => 'Dulce']);
        $floral    = Category::create(['nombre' => 'Floral']);

        $perfumes = [
            [
                'nombre'      => 'Sauvage',
                'descripcion' => 'Una fragancia radical e iconica inspirada en vastos paisajes salvajes. Notas de bergamota calabresa y pimienta de Sichuan abren paso a un corazon amaderado y especiado.',
                'imagen'      => 'images/perfumes/dior-sauvage.png',
                'brand_id'    => $dior->id,
                'category_id' => $amaderado->id,
                'resenas' => [
                    ['calificacion' => 5, 'comentario' => 'El mejor perfume masculino que he probado. La proyeccion es brutal y dura todo el dia.', 'duracion' => 12, 'proyeccion' => 3],
                    ['calificacion' => 4, 'comentario' => 'Clasico y versatil, perfecto para cualquier ocasion. Lo uso tanto de dia como de noche.', 'duracion' => 9,  'proyeccion' => 2],
                    ['calificacion' => 5, 'comentario' => 'Todo el mundo me pregunta que perfume uso. Sin duda una obra maestra de Dior.', 'duracion' => 11, 'proyeccion' => 3],
                ],
            ],
            [
                'nombre'      => 'Miss Dior',
                'descripcion' => 'Una fragancia floral con caracter. Notas de rosa de Grasse, peonia y almizcles blancos crean una composicion femenina y audaz a la vez.',
                'imagen'      => 'images/perfumes/miss-dior.png',
                'brand_id'    => $dior->id,
                'category_id' => $floral->id,
                'resenas' => [
                    ['calificacion' => 5, 'comentario' => 'Romantico y delicado. La rosa es protagonista pero sin ser empalagoso. Me encanta.', 'duracion' => 8,  'proyeccion' => 2],
                    ['calificacion' => 4, 'comentario' => 'Muy femenino y elegante. Ideal para una cita o evento especial.', 'duracion' => 7,  'proyeccion' => 2],
                    ['calificacion' => 3, 'comentario' => 'Bonito pero se va rapido. Esperaba mas duracion para el precio que tiene.', 'duracion' => 5,  'proyeccion' => 1],
                ],
            ],
            [
                'nombre'      => 'Bleu de Chanel',
                'descripcion' => 'Una oda a la libertad masculina. Citricos frescos, madera de cedro y sandalo se combinan en una fragancia sofisticada y atemporal.',
                'imagen'      => 'images/perfumes/bleu-de-chanel.png',
                'brand_id'    => $chanel->id,
                'category_id' => $amaderado->id,
                'resenas' => [
                    ['calificacion' => 5, 'comentario' => 'Sofisticado y elegante. Lo uso para el trabajo y siempre recibo cumplidos.', 'duracion' => 10, 'proyeccion' => 2],
                    ['calificacion' => 4, 'comentario' => 'Muy buen perfume, fresco al principio y amaderado al secar. Gran versatilidad.', 'duracion' => 8,  'proyeccion' => 2],
                    ['calificacion' => 5, 'comentario' => 'El perfume definitivo para un hombre moderno. No me canso de usarlo.', 'duracion' => 9,  'proyeccion' => 3],
                    ['calificacion' => 4, 'comentario' => 'Excelente relacion calidad-precio. Dura mucho y la estela es increible.', 'duracion' => 10, 'proyeccion' => 2],
                ],
            ],
            [
                'nombre'      => 'Coco Mademoiselle',
                'descripcion' => 'Audaz y femenina. Una fragancia oriental fresca con notas de naranja, rosa, jazmin, pachuli y vetiver que deja una estela irresistible.',
                'imagen'      => 'images/perfumes/coco-chanel.png',
                'brand_id'    => $chanel->id,
                'category_id' => $oriental->id,
                'resenas' => [
                    ['calificacion' => 5, 'comentario' => 'Iconica y atemporal. Una fragancia que nunca pasa de moda y siempre impresiona.', 'duracion' => 10, 'proyeccion' => 3],
                    ['calificacion' => 4, 'comentario' => 'La estela que deja es adictiva. Me persiguen para preguntarme que llevo puesto.', 'duracion' => 8,  'proyeccion' => 2],
                    ['calificacion' => 5, 'comentario' => 'Mi perfume favorito desde hace anos. El pachuli le da una profundidad unica.', 'duracion' => 9,  'proyeccion' => 3],
                ],
            ],
            [
                'nombre'      => 'Eros',
                'descripcion' => 'Inspirado en el dios griego del amor. Una explosion de menta fresca, manzana verde y limon con un corazon de haba tonka y ambarina.',
                'imagen'      => 'images/perfumes/versace-eros.png',
                'brand_id'    => $versace->id,
                'category_id' => $citrico->id,
                'resenas' => [
                    ['calificacion' => 5, 'comentario' => 'Fresco, vibrante y seductor. Perfecto para el verano y las noches de fiesta.', 'duracion' => 8,  'proyeccion' => 3],
                    ['calificacion' => 4, 'comentario' => 'La menta inicial es increible. Evoluciona muy bien hacia algo mas calido y sensual.', 'duracion' => 7,  'proyeccion' => 2],
                    ['calificacion' => 3, 'comentario' => 'Bueno pero muy dulce para mi gusto. Ideal para jovenes pero no tanto para adultos.', 'duracion' => 6,  'proyeccion' => 2],
                ],
            ],
            [
                'nombre'      => 'Dylan Blue',
                'descripcion' => 'Una fragancia acuatica e intensa. Hoja de higuera, pomelo y violeta se mezclan con notas de ambar y pachuli en una composicion profunda.',
                'imagen'      => 'images/perfumes/versace-dylan-blue.png',
                'brand_id'    => $versace->id,
                'category_id' => $amaderado->id,
                'resenas' => [
                    ['calificacion' => 4, 'comentario' => 'Fresco y misterioso a la vez. La higuera le da un toque diferente y muy agradable.', 'duracion' => 8,  'proyeccion' => 2],
                    ['calificacion' => 5, 'comentario' => 'Mi fragancia go-to para el trabajo. Profesional, limpia y con gran duracion.', 'duracion' => 10, 'proyeccion' => 2],
                    ['calificacion' => 4, 'comentario' => 'Muy buena relacion calidad precio. Se nota la calidad en cada nota.', 'duracion' => 7,  'proyeccion' => 2],
                ],
            ],
            [
                'nombre'      => 'Good Girl',
                'descripcion' => 'Dualidad en un frasco iconico con forma de zapato de tacon. Notas de jazmin sambac, cacao, cafe y cedro crean una fragancia seductora e inesperada.',
                'imagen'      => 'images/perfumes/good-girl.png',
                'brand_id'    => $carolina->id,
                'category_id' => $dulce->id,
                'resenas' => [
                    ['calificacion' => 5, 'comentario' => 'El frasco es una obra de arte y el perfume a la altura. Seductor y adictivo.', 'duracion' => 9,  'proyeccion' => 3],
                    ['calificacion' => 4, 'comentario' => 'El cafe y el jazmin crean una combinacion unica. Ideal para la noche.', 'duracion' => 8,  'proyeccion' => 2],
                    ['calificacion' => 5, 'comentario' => 'Mi perfume favorito para salir. Siempre recibo halagos cuando lo llevo puesto.', 'duracion' => 10, 'proyeccion' => 3],
                    ['calificacion' => 3, 'comentario' => 'Bonito pero muy intenso para el dia a dia. Solo lo uso en ocasiones especiales.', 'duracion' => 7,  'proyeccion' => 3],
                ],
            ],
            [
                'nombre'      => '212 VIP',
                'descripcion' => 'El perfume de la vida nocturna. Notas de gardenia, caramelo y madera blanca evocan el glamour exclusivo de las fiestas mas selectas de Nueva York.',
                'imagen'      => 'images/perfumes/212-vip.png',
                'brand_id'    => $carolina->id,
                'category_id' => $dulce->id,
                'resenas' => [
                    ['calificacion' => 4, 'comentario' => 'Glamuroso y divertido. El caramelo y la gardenia son una combinacion ganadora.', 'duracion' => 7,  'proyeccion' => 2],
                    ['calificacion' => 5, 'comentario' => 'Me transporta directamente a una fiesta en Nueva York. Increible y muy duradero.', 'duracion' => 9,  'proyeccion' => 3],
                    ['calificacion' => 3, 'comentario' => 'Demasiado dulce para mi. Ideal para quienes les gustan las fragancias golosinas.', 'duracion' => 6,  'proyeccion' => 2],
                ],
            ],
            [
                'nombre'      => 'Black Opium',
                'descripcion' => 'Adictiva y rock. Cafe negro, vainilla y flor de naranjo se fusionan en una fragancia oriental gourmand que despierta los sentidos.',
                'imagen'      => 'images/perfumes/black-opium.png',
                'brand_id'    => $ysl->id,
                'category_id' => $oriental->id,
                'resenas' => [
                    ['calificacion' => 5, 'comentario' => 'Literalmente adictivo. El cafe y la vainilla crean algo unico que no puedo dejar de oler.', 'duracion' => 10, 'proyeccion' => 3],
                    ['calificacion' => 5, 'comentario' => 'Mi perfume de cabecera para el invierno. Envolvente, calido y tremendamente seductor.', 'duracion' => 11, 'proyeccion' => 3],
                    ['calificacion' => 4, 'comentario' => 'Muy bueno aunque algo intenso. Mejor para la noche que para el dia.', 'duracion' => 9,  'proyeccion' => 2],
                    ['calificacion' => 3, 'comentario' => 'Huele bien pero es demasiado empalagoso para usarlo a diario.', 'duracion' => 7,  'proyeccion' => 2],
                ],
            ],
            [
                'nombre'      => 'Libre',
                'descripcion' => 'Una fragancia que celebra la libertad. Lavanda de Provenza, flor de naranjo de Marruecos y vainilla africana crean un contraste audaz y femenino.',
                'imagen'      => 'images/perfumes/libre-ysl.png',
                'brand_id'    => $ysl->id,
                'category_id' => $floral->id,
                'resenas' => [
                    ['calificacion' => 5, 'comentario' => 'La lavanda con vainilla es una combinacion magistral. Fresco y calido al mismo tiempo.', 'duracion' => 9,  'proyeccion' => 2],
                    ['calificacion' => 4, 'comentario' => 'Elegante y moderno. Funciona muy bien tanto de dia como de noche.', 'duracion' => 8,  'proyeccion' => 2],
                    ['calificacion' => 5, 'comentario' => 'Me enamoro cada vez que lo huelo. La estela que deja es simplemente perfecta.', 'duracion' => 10, 'proyeccion' => 3],
                ],
            ],
        ];

        foreach ($perfumes as $data) {
            $resenas = $data['resenas'];
            unset($data['resenas']);

            $perfume = Perfume::create($data);
            $shuffledUsers = $users->shuffle();

            foreach ($resenas as $index => $resena) {
                Review::create([
                    'user_id'      => $shuffledUsers[$index]->id,
                    'perfume_id'   => $perfume->id,
                    'calificacion' => $resena['calificacion'],
                    'comentario'   => $resena['comentario'],
                    'duracion'     => $resena['duracion'],
                    'proyeccion'   => $resena['proyeccion'],
                ]);
            }
        }
    }
}