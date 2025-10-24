<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'title' => 'Casa Moderna em Condomínio',
            'description' => 'Projeto de construção de casa moderna em condomínio fechado. Área total de 250m² com 4 quartos, 3 banheiros, sala de estar, cozinha integrada e garagem para 2 carros. Acabamento de alta qualidade com materiais importados.',
        ]);

        Project::create([
            'title' => 'Reforma Completa de Apartamento',
            'description' => 'Reforma completa de apartamento de 120m² no centro da cidade. Incluiu demolição de paredes, instalação de novos pisos, pintura, instalação de cozinha planejada e banheiros modernos. Prazo de execução: 3 meses.',
        ]);

        Project::create([
            'title' => 'Ampliação de Comercial',
            'description' => 'Ampliação de 100m² em estabelecimento comercial. Novo espaço para ampliação de loja com acabamento moderno, iluminação LED e climatização. Projeto realizado sem interrupção das atividades comerciais.',
        ]);

        Project::create([
            'title' => 'Construção de Sobrado',
            'description' => 'Construção de sobrado em terreno de 200m² com 2 pavimentos. Projeto inclui 3 quartos, 2 banheiros, sala, cozinha e área de serviço. Estrutura em alvenaria com acabamento em reboco e pintura.',
        ]);

        Project::create([
            'title' => 'Reforma de Fachada',
            'description' => 'Reforma completa de fachada de prédio residencial com 6 andares. Substituição de revestimento, pintura, impermeabilização e instalação de novo sistema de drenagem. Trabalho realizado com segurança e qualidade.',
        ]);

        Project::create([
            'title' => 'Construção de Galpão Industrial',
            'description' => 'Construção de galpão industrial com 500m² de área construída. Estrutura metálica, piso industrial, sistema de iluminação e ventilação. Projeto executado dentro do prazo e orçamento.',
        ]);
    }
}

