<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HomeContent;

class SpanishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = [
            'header_title' => '¡Encuentre las mejores ofertas y ahorre en su próxima compra!',
            'header_description' => 'Obtenga comparaciones de productos gratuitas e imparciales, lea reseñas de clientes reales y',
            'header_background_img' => 'front/img/bnnr-bg.png',
            'header_img' => 'front/img/banner_image.png',
            'placeholder_text' => 'Ingresa un producto, categoría o lo que deseas comparar...',
            'trusted_brands_text' => 'Marcas confiables, opciones inmejorables',
            'trusted_brands_img' => 'front/img/marq-img1.svg',
            'most_popular' => 'Más Popular',
            'campare_business' => 'Comparar software empresarial',
            'visit_website' => 'visitar sitio web',
            'exclusive_deals' => 'Ofertas exclusivas',
            'all_exclusive' => 'Todas las ofertas exclusivas',
            'get_this_deal' => 'Obtenga esta oferta',
            'ai_section_left_img' => 'front/img/right-tool-vector1.png',
            'ai_section_right_img' => 'front/img/right-tool-vector2.png',
            'ai_title' => 'Búsqueda inteligente impulsada por IA',
            'ai_description' => 'Descubra y compare rápidamente los mejores productos con nuestra búsqueda impulsada por IA, diseñada para adaptarse a sus necesidades y preferencias específicas.',
            'ai_placeholder' => 'Ingresa un producto, categoría o lo que deseas comparar...',
            'ai_send_img' => 'front/img/btn-img.svg',
            'top_product' => 'Productos mejor valorados',
            'all_top_product' => 'Todos los productos mejor valorados',
            'latest_reviews' => 'Últimas reseñas',
            'write_review' => 'Escribe una reseña',
            'review_section_right_img' => 'front/img/right-tool-vector1.png',
            'review_section_left_img' => 'front/img/right-tool-vector2.png',
            'read_article' => 'Lee nuestros artículos',
            'view_all_article' => 'Ver todos los artículos',
            'find_tool' => 'Encuentra la herramienta adecuada',
            'find_tool_left_img' => 'front/img/right-tool-vector1.png',
            'find_tool_right_img' => 'front/img/right-tool-vector2.png',
            'user_reviews_img' => 'front/img/right-tool-img1.png',
            'verify_user_review' => 'Reseñas de usuarios verificadas',
            'verify_review_description' => 'Lee comentarios reales de usuarios verificados para ayudarte a tomar la decisión correcta.',
            'price_compare_img' => 'front/img/right-tool-img2.png',
            'feature_price' => 'Comparaciones de características y precios',
            'feature_price_description' => 'Compara fácilmente software basado en características clave, precios y calificaciones de usuarios.',
            'independent_img' => 'front/img/right-tool-img3.png',
            'independent' => 'Perspectivas independientes',
            'independent_description' => 'Accede a investigaciones imparciales y basadas en datos para obtener el mayor valor de tu software.',
            'get_button_lable' => 'Comenzar'
        ];


        foreach($arr as $meta_key=> $meta_value){
            HomeContent::create([
                'meta_key' => $meta_key,
                'meta_value' => $meta_value,
                'lang_id' => '18'
            ]);
        }
    }
}
