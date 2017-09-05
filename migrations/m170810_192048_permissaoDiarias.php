<?php

use yii\db\Migration;

class m170810_192048_permissaoDiarias extends Migration
{
    const PERFIL = 1;
    const ACESSO = 2;
    public function safeUp()
    {
        $this->createTable('public.status',
            [
                'status_id' => $this->primaryKey()->unique()->notNull(),
                'status_nm' => $this->string(60)->notNull(),
            ]);

        $this->batchInsert('public.status', ['status_id', 'status_nm'],
            [
                [1, 'Ativo'],
                [2, 'Inativo']
            ]
        );

        $this->createTable('public.sistema',
            [
                'sistema_id' => $this->primaryKey()->unique()->notNull(),
                'sistema_nm' => $this->string(60)->notNull(),
                'status_id' => $this->integer(1)->notNull()
            ]);
        $this->addForeignKey('status_sistema', 'public.sistema', 'status_id', 'public.status', 'status_id');

        $this->insert('public.sistema', ['sistema_id' => 1, 'sistema_nm' => 'Diárias', 'status_id' => 1]);

        $this->createTable('public.menu_sistema',
            [
                'menu_id' => $this->primaryKey()->unique()->notNull(),
                'menu_nm' => $this->string(60)->notNull(),
                'sistema_id' => $this->integer(20)->notNull()
            ]);

        $this->addForeignKey('menu_sitema', 'public.menu_sistema', 'sistema_id', 'public.sistema', 'sistema_id');

        $this->batchInsert('public.menu_sistema', ['menu_id', 'menu_nm', 'sistema_id'],
            [
                [1, 'Cadastro', 1],
                [2, 'Diárias', 1],
                [3, 'Financeiro', 1],
                [4, 'DRM', 1],
                [5, 'Permissões', 1],
                [6, 'Consulta', 1],
                [7, 'Relatório', 1],
            ]);

        $this->addColumn('public.auth_item', 'link', $this->string(60));
        $this->addColumn('public.auth_item', 'sistema_menu', $this->integer(60));
        $this->batchInsert('public.auth_item',
                ['name',                        'type',        'description',                       'link',                             'sistema_menu'],
            [
                ['administrador',               $this::PERFIL, 'Administrador',                     null,                               null],
                ['aprovador',                   $this::PERFIL, 'Aprovador',                         null,                               null],
                ['autorizador',                 $this::PERFIL, 'Autorizador',                       null,                               null],
                ['comprovador',                 $this::PERFIL, 'Comprovador',                       null,                               null],
                ['consulta-diarias',            $this::PERFIL, 'Consulta Diárias',                  null,                               null],
                ['empenha-executa',             $this::PERFIL, 'Empenha/Executa',                   null,                               null],
                ['gestor-orcamento',            $this::PERFIL, 'Gestor de Orçamento',               null,                               null],
                ['gestor-despesas',             $this::PERFIL, 'Gestor Despesas',                   null,                               null],
                ['gestor-diarias',              $this::PERFIL, 'Gestor Diárias',                    null,                               null],
                ['gestor-financeiro',           $this::PERFIL, 'Gestor Financeiro',                 null,                               null],
                ['gestor-orcamentario',         $this::PERFIL, 'Gestor Orçamentário',               null,                               null],
                ['pre-autorizador',             $this::PERFIL, 'Pré-Autorizador',                   null,                               null],
                ['pre-liquidante',              $this::PERFIL, 'Pré-Liquidante',                     null,                               null],
                ['recursos-humanos',            $this::PERFIL, 'Recursos Humanos',                  null,                               null],
                ['solicitante',                 $this::PERFIL, 'Solicitante',                       null,                               null],
                ['usuario-consulta',            $this::PERFIL, 'Usuário consulta',                  null,                               null],
                ['nenhum',                      $this::PERFIL, 'Nenhum',                            null,                               null],


                ['diaria-view',                 $this::ACESSO, 'Diária View',                       '/diarias/view',                    0],
                ['diaria-delete',               $this::ACESSO, 'Diária Delete',                     '/diarias/delete',                  0],
                ['diaria-comprovacao',          $this::ACESSO, 'Comprovacao',                       '/diarias/comprovacao',             0],
                ['diaria-solicitar',            $this::ACESSO, 'Solicitar',                         '/diarias/solicitar',               0],
                ['diaria-index',                $this::ACESSO, 'Solicitações',                      '/diarias/index',                   2],
                ['diaria-pre-autorizar',        $this::ACESSO, 'Solicitações Para Pré-Autorizar',   '/diarias/pre-autorizar',           2],
                ['diaria-arquivadas',           $this::ACESSO, 'Solicitações Arquivadas',           '/diarias/arquivadas',              2],
                ['diaria-autorizar',            $this::ACESSO, 'Solicitações para Autorizar',       '/diarias/autorizar',               2],
                ['diaria-montar-processo',      $this::ACESSO, 'Montar Processo',                   '/diarias/montar-processo',         2],
                ['diaria-aprovar',              $this::ACESSO, 'Solicitações para Aprovar',         '/diarias/aprovar',                 2],
                ['diaria-empenho',              $this::ACESSO, 'Solicitações para Empenho',         '/diarias/empenho',                 2],
                ['diaria-alterar-comprovacao',  $this::ACESSO, 'Alterar Comprovação Diária',        '/diarias/alterar-comprovacao',     2],
                ['diaria-aprovacao-comprovacao',$this::ACESSO, 'Comprovações para Aprovação',       '/diarias/comprovacao-aprovacao',   2],

            ]);

        $this->batchInsert('public.auth_item_child',
                ['parent',        'child'],
            [
                ['administrador', 'diaria-index'],
                ['administrador', 'diaria-view'],
                ['administrador', 'diaria-delete'],
                ['administrador', 'diaria-solicitar'],
                ['administrador', 'diaria-pre-autorizar'],
                ['administrador', 'diaria-arquivadas'],
                ['administrador', 'diaria-autorizar'],
                ['administrador', 'diaria-montar-processo'],
                ['administrador', 'diaria-aprovar'],
                ['administrador', 'diaria-empenho'],
                ['administrador', 'diaria-comprovacao'],
                ['administrador', 'diaria-alterar-comprovacao'],
                ['administrador', 'diaria-aprovacao-comprovacao'],

                ['aprovador', 'diaria-index'],
                ['aprovador', 'diaria-view'],
                ['aprovador', 'diaria-arquivadas'],
                ['aprovador', 'diaria-autorizar'],
                ['aprovador', 'diaria-aprovar'],
                ['aprovador', 'diaria-comprovacao'],
                ['aprovador', 'diaria-alterar-comprovacao'],

                ['autorizador', 'diaria-index'],
                ['autorizador', 'diaria-view'],
                ['autorizador', 'diaria-solicitar'],
                ['autorizador', 'diaria-arquivadas'],
                ['autorizador', 'diaria-montar-processo'],
                ['autorizador', 'diaria-autorizar'],
                ['autorizador', 'diaria-comprovacao'],
                ['autorizador', 'diaria-alterar-comprovacao'],
                ['autorizador', 'diaria-aprovacao-comprovacao'],

                ['comprovador', 'diaria-index'],
                ['comprovador', 'diaria-view'],
                ['comprovador', 'diaria-arquivadas'],
                ['comprovador', 'diaria-comprovacao'],
                ['comprovador', 'diaria-alterar-comprovacao'],

                ['empenha-executa', 'diaria-index'],
                ['empenha-executa', 'diaria-view'],
                ['empenha-executa', 'diaria-empenho'],
                ['empenha-executa', 'diaria-comprovacao'],
                ['empenha-executa', 'diaria-alterar-comprovacao'],

                ['gestor-orcamento', 'diaria-index'],
                ['gestor-orcamento', 'diaria-view'],
                ['gestor-orcamento', 'diaria-arquivadas'],

                ['gestor-despesas', 'diaria-index'],
                ['gestor-despesas', 'diaria-view'],
                ['gestor-despesas', 'diaria-arquivadas'],
                ['gestor-despesas', 'diaria-comprovacao'],
                ['gestor-despesas', 'diaria-alterar-comprovacao'],

                ['gestor-diarias', 'diaria-index'],
                ['gestor-diarias', 'diaria-view'],
                ['gestor-diarias', 'diaria-arquivadas'],
                ['gestor-diarias', 'diaria-comprovacao'],
                ['gestor-diarias', 'diaria-alterar-comprovacao'],
                ['gestor-diarias', 'diaria-empenho'],
                ['gestor-diarias', 'diaria-aprovacao-comprovacao'],

                ['gestor-financeiro', 'diaria-index'],
                ['gestor-financeiro', 'diaria-view'],
                ['gestor-financeiro', 'diaria-arquivadas'],
                ['gestor-financeiro', 'diaria-comprovacao'],
                ['gestor-financeiro', 'diaria-alterar-comprovacao'],

                ['gestor-orcamentario', 'diaria-index'],
                ['gestor-orcamentario', 'diaria-view'],
                ['gestor-orcamentario', 'diaria-comprovacao'],
                ['gestor-orcamentario', 'diaria-arquivadas'],
                ['gestor-orcamentario', 'diaria-alterar-comprovacao'],

                ['pre-autorizador', 'diaria-index'],
                ['pre-autorizador', 'diaria-view'],
                ['pre-autorizador', 'diaria-pre-autorizar'],
                ['pre-autorizador', 'diaria-solicitar'],
                ['pre-autorizador', 'diaria-arquivadas'],
                ['pre-autorizador', 'diaria-comprovacao'],
                ['pre-autorizador', 'diaria-alterar-comprovacao'],
                ['pre-autorizador', 'diaria-aprovacao-comprovacao'],

                ['pre-liquidante', 'diaria-index'],
                ['pre-liquidante', 'diaria-view'],
                ['pre-liquidante', 'diaria-arquivadas'],
                ['pre-liquidante', 'diaria-comprovacao'],
                ['pre-liquidante', 'diaria-alterar-comprovacao'],

                ['recursos-humanos', 'diaria-index'],
                ['recursos-humanos', 'diaria-view'],
                ['recursos-humanos', 'diaria-arquivadas'],
                ['recursos-humanos', 'diaria-comprovacao'],
                ['recursos-humanos', 'diaria-alterar-comprovacao'],

                ['solicitante', 'diaria-index'],
                ['solicitante', 'diaria-view'],
                ['solicitante', 'diaria-solicitar'],
                ['solicitante', 'diaria-arquivadas'],
                ['solicitante', 'diaria-comprovacao'],
                ['solicitante', 'diaria-alterar-comprovacao'],
                ['solicitante', 'diaria-aprovacao-comprovacao'],

                ['usuario-consulta', 'diaria-index'],
                ['usuario-consulta', 'diaria-view'],
                ['usuario-consulta', 'diaria-arquivadas'],
                ['usuario-consulta', 'diaria-comprovacao'],
                ['usuario-consulta', 'diaria-alterar-comprovacao'],
            ]
        );
        $this->addColumn('public.auth_assignment', 'sistema_id', $this->integer()->notNull());
        $this->addForeignKey('public_sistema', 'public.auth_assignment', 'sistema_id', 'public.sistema', 'sistema_id');
    }

    public function safeDown()
    {
        $this->delete('public.auth_item', ['name' => 'administrador']);
        $this->delete('public.auth_item', ['name' => 'aprovador']);
        $this->delete('public.auth_item', ['name' => 'autorizador']);
        $this->delete('public.auth_item', ['name' => 'comprovador']);
        $this->delete('public.auth_item', ['name' => 'consulta-diarias']);
        $this->delete('public.auth_item', ['name' => 'empenha-executa']);
        $this->delete('public.auth_item', ['name' => 'gestor-orcamento']);
        $this->delete('public.auth_item', ['name' => 'gestor-despesas']);
        $this->delete('public.auth_item', ['name' => 'gestor-diarias']);
        $this->delete('public.auth_item', ['name' => 'gestor-financeiro']);
        $this->delete('public.auth_item', ['name' => 'gestor-orcamentario']);
        $this->delete('public.auth_item', ['name' => 'pre-autorizador']);
        $this->delete('public.auth_item', ['name' => 'pre-liquidante']);
        $this->delete('public.auth_item', ['name' => 'recursos-humanos']);
        $this->delete('public.auth_item', ['name' => 'solicitante']);
        $this->delete('public.auth_item', ['name' => 'usuario-consulta']);
        $this->delete('public.auth_item', ['name' => 'nenhum']);
        $this->delete('public.auth_item', ['name' => 'diaria-index']);
        $this->delete('public.auth_item', ['name' => 'diaria-view']);
        $this->delete('public.auth_item', ['name' => 'diaria-delete']);
        $this->delete('public.auth_item', ['name' => 'diaria-solicitar']);
        $this->delete('public.auth_item', ['name' => 'diaria-pre-autorizar']);
        $this->delete('public.auth_item', ['name' => 'diaria-arquivadas']);
        $this->delete('public.auth_item', ['name' => 'diaria-autorizar']);
        $this->delete('public.auth_item', ['name' => 'diaria-montar-processo']);
        $this->delete('public.auth_item', ['name' => 'diaria-aprovar']);
        $this->delete('public.auth_item', ['name' => 'diaria-empenho']);
        $this->delete('public.auth_item', ['name' => 'diaria-comprovacao']);
        $this->delete('public.auth_item', ['name' => 'diaria-alterar-comprovacao']);
        $this->delete('public.auth_item', ['name' => 'diaria-aprovacao-comprovacao']);

        $this->delete('public.auth_item_child', ['parent' => 'administrador', 'child' => 'diaria-index']);
        $this->delete('public.auth_item_child', ['parent' => 'administrador', 'child' => 'diaria-view']);
        $this->delete('public.auth_item_child', ['parent' => 'administrador', 'child' => 'diaria-delete']);
        $this->delete('public.auth_item_child', ['parent' => 'administrador', 'child' => 'diaria-solicitar']);
        $this->delete('public.auth_item_child', ['parent' => 'administrador', 'child' => 'diaria-pre-autorizar']);
        $this->delete('public.auth_item_child', ['parent' => 'administrador', 'child' => 'diaria-arquivadas']);
        $this->delete('public.auth_item_child', ['parent' => 'administrador', 'child' => 'diaria-autorizar']);
        $this->delete('public.auth_item_child', ['parent' => 'administrador', 'child' => 'diaria-montar-processo']);
        $this->delete('public.auth_item_child', ['parent' => 'administrador', 'child' => 'diaria-aprovar']);
        $this->delete('public.auth_item_child', ['parent' => 'administrador', 'child' => 'diaria-empenho']);
        $this->delete('public.auth_item_child', ['parent' => 'administrador', 'child' => 'diaria-comprovacao']);
        $this->delete('public.auth_item_child', ['parent' => 'administrador', 'child' => 'diaria-alterar-comprovacao']);
        $this->delete('public.auth_item_child', ['parent' => 'administrador', 'child' => 'diaria-aprovacao-comprovacao']);

        $this->delete('public.auth_item_child', ['parent' => 'aprovador', 'child' => 'diaria-index']);
        $this->delete('public.auth_item_child', ['parent' => 'aprovador', 'child' => 'diaria-view']);
        $this->delete('public.auth_item_child', ['parent' => 'aprovador', 'child' => 'diaria-arquivadas']);
        $this->delete('public.auth_item_child', ['parent' => 'aprovador', 'child' => 'diaria-autorizar']);
        $this->delete('public.auth_item_child', ['parent' => 'aprovador', 'child' => 'diaria-aprovar']);
        $this->delete('public.auth_item_child', ['parent' => 'aprovador', 'child' => 'diaria-comprovacao']);
        $this->delete('public.auth_item_child', ['parent' => 'aprovador', 'child' => 'diaria-alterar-comprovacao']);

        $this->delete('public.auth_item_child', ['parent' => 'autorizador', 'child' => 'diaria-index']);
        $this->delete('public.auth_item_child', ['parent' => 'autorizador', 'child' => 'diaria-view']);
        $this->delete('public.auth_item_child', ['parent' => 'autorizador', 'child' => 'diaria-solicitar']);
        $this->delete('public.auth_item_child', ['parent' => 'autorizador', 'child' => 'diaria-arquivadas']);
        $this->delete('public.auth_item_child', ['parent' => 'autorizador', 'child' => 'diaria-montar-processo']);
        $this->delete('public.auth_item_child', ['parent' => 'autorizador', 'child' => 'diaria-autorizar']);
        $this->delete('public.auth_item_child', ['parent' => 'autorizador', 'child' => 'diaria-comprovacao']);
        $this->delete('public.auth_item_child', ['parent' => 'autorizador', 'child' => 'diaria-alterar-comprovacao']);
        $this->delete('public.auth_item_child', ['parent' => 'autorizador', 'child' => 'diaria-aprovacao-comprovacao']);

        $this->delete('public.auth_item_child', ['parent' => 'comprovador', 'child' => 'diaria-index']);
        $this->delete('public.auth_item_child', ['parent' => 'comprovador', 'child' => 'diaria-view']);
        $this->delete('public.auth_item_child', ['parent' => 'comprovador', 'child' => 'diaria-arquivadas']);
        $this->delete('public.auth_item_child', ['parent' => 'comprovador', 'child' => 'diaria-comprovacao']);
        $this->delete('public.auth_item_child', ['parent' => 'comprovador', 'child' => 'diaria-alterar-comprovacao']);

        $this->delete('public.auth_item_child', ['parent' => 'empenha-executa', 'child' => 'diaria-index']);
        $this->delete('public.auth_item_child', ['parent' => 'empenha-executa', 'child' => 'diaria-view']);
        $this->delete('public.auth_item_child', ['parent' => 'empenha-executa', 'child' => 'diaria-empenho']);
        $this->delete('public.auth_item_child', ['parent' => 'empenha-executa', 'child' => 'diaria-comprovacao']);
        $this->delete('public.auth_item_child', ['parent' => 'empenha-executa', 'child' => 'diaria-alterar-comprovacao']);

        $this->delete('public.auth_item_child', ['parent' => 'gestor-orcamento', 'child' => 'diaria-index']);
        $this->delete('public.auth_item_child', ['parent' => 'gestor-orcamento', 'child' => 'diaria-view']);
        $this->delete('public.auth_item_child', ['parent' => 'gestor-orcamento', 'child' => 'diaria-arquivadas']);

        $this->delete('public.auth_item_child', ['parent' => 'gestor-despesas', 'child' => 'diaria-index']);
        $this->delete('public.auth_item_child', ['parent' => 'gestor-despesas', 'child' => 'diaria-view']);
        $this->delete('public.auth_item_child', ['parent' => 'gestor-despesas', 'child' => 'diaria-arquivadas']);
        $this->delete('public.auth_item_child', ['parent' => 'gestor-despesas', 'child' => 'diaria-comprovacao']);
        $this->delete('public.auth_item_child', ['parent' => 'gestor-despesas', 'child' => 'diaria-alterar-comprovacao']);

        $this->delete('public.auth_item_child', ['parent' => 'gestor-diarias', 'child' => 'diaria-index']);
        $this->delete('public.auth_item_child', ['parent' => 'gestor-diarias', 'child' => 'diaria-view']);
        $this->delete('public.auth_item_child', ['parent' => 'gestor-diarias', 'child' => 'diaria-arquivadas']);
        $this->delete('public.auth_item_child', ['parent' => 'gestor-diarias', 'child' => 'diaria-comprovacao']);
        $this->delete('public.auth_item_child', ['parent' => 'gestor-diarias', 'child' => 'diaria-alterar-comprovacao']);
        $this->delete('public.auth_item_child', ['parent' => 'gestor-diarias', 'child' => 'diaria-empenho']);
        $this->delete('public.auth_item_child', ['parent' => 'gestor-diarias', 'child' => 'diaria-aprovacao-comprovacao']);

        $this->delete('public.auth_item_child', ['parent' => 'gestor-financeiro', 'child' => 'diaria-index']);
        $this->delete('public.auth_item_child', ['parent' => 'gestor-financeiro', 'child' => 'diaria-view']);
        $this->delete('public.auth_item_child', ['parent' => 'gestor-financeiro', 'child' => 'diaria-arquivadas']);
        $this->delete('public.auth_item_child', ['parent' => 'gestor-financeiro', 'child' => 'diaria-comprovacao']);
        $this->delete('public.auth_item_child', ['parent' => 'gestor-financeiro', 'child' => 'diaria-alterar-comprovacao']);

        $this->delete('public.auth_item_child', ['parent' => 'gestor-orcamentario', 'child' => 'diaria-index']);
        $this->delete('public.auth_item_child', ['parent' => 'gestor-orcamentario', 'child' => 'diaria-view']);
        $this->delete('public.auth_item_child', ['parent' => 'gestor-orcamentario', 'child' => 'diaria-comprovacao']);
        $this->delete('public.auth_item_child', ['parent' => 'gestor-orcamentario', 'child' => 'diaria-arquivadas']);
        $this->delete('public.auth_item_child', ['parent' => 'gestor-orcamentario', 'child' => 'diaria-alterar-comprovacao']);

        $this->delete('public.auth_item_child', ['parent' => 'pre-autorizador', 'child' => 'diaria-index']);
        $this->delete('public.auth_item_child', ['parent' => 'pre-autorizador', 'child' => 'diaria-view']);
        $this->delete('public.auth_item_child', ['parent' => 'pre-autorizador', 'child' => 'diaria-pre-autorizar']);
        $this->delete('public.auth_item_child', ['parent' => 'pre-autorizador', 'child' => 'diaria-solicitar']);
        $this->delete('public.auth_item_child', ['parent' => 'pre-autorizador', 'child' => 'diaria-arquivadas']);
        $this->delete('public.auth_item_child', ['parent' => 'pre-autorizador', 'child' => 'diaria-comprovacao']);
        $this->delete('public.auth_item_child', ['parent' => 'pre-autorizador', 'child' => 'diaria-alterar-comprovacao']);
        $this->delete('public.auth_item_child', ['parent' => 'pre-autorizador', 'child' => 'diaria-aprovacao-comprovacao']);

        $this->delete('public.auth_item_child', ['parent' => 'pre-liquidante', 'child' => 'diaria-index']);
        $this->delete('public.auth_item_child', ['parent' => 'pre-liquidante', 'child' => 'diaria-view']);
        $this->delete('public.auth_item_child', ['parent' => 'pre-liquidante', 'child' => 'diaria-arquivadas']);
        $this->delete('public.auth_item_child', ['parent' => 'pre-liquidante', 'child' => 'diaria-comprovacao']);
        $this->delete('public.auth_item_child', ['parent' => 'pre-liquidante', 'child' => 'diaria-alterar-comprovacao']);

        $this->delete('public.auth_item_child', ['parent' => 'recursos-humanos', 'child' => 'diaria-index']);
        $this->delete('public.auth_item_child', ['parent' => 'recursos-humanos', 'child' => 'diaria-view']);
        $this->delete('public.auth_item_child', ['parent' => 'recursos-humanos', 'child' => 'diaria-arquivadas']);
        $this->delete('public.auth_item_child', ['parent' => 'recursos-humanos', 'child' => 'diaria-comprovacao']);
        $this->delete('public.auth_item_child', ['parent' => 'recursos-humanos', 'child' => 'diaria-alterar-comprovacao']);

        $this->delete('public.auth_item_child', ['parent' => 'solicitante', 'child' => 'diaria-index']);
        $this->delete('public.auth_item_child', ['parent' => 'solicitante', 'child' => 'diaria-view']);
        $this->delete('public.auth_item_child', ['parent' => 'solicitante', 'child' => 'diaria-solicitar']);
        $this->delete('public.auth_item_child', ['parent' => 'solicitante', 'child' => 'diaria-arquivadas']);
        $this->delete('public.auth_item_child', ['parent' => 'solicitante', 'child' => 'diaria-comprovacao']);
        $this->delete('public.auth_item_child', ['parent' => 'solicitante', 'child' => 'diaria-alterar-comprovacao']);
        $this->delete('public.auth_item_child', ['parent' => 'solicitante', 'child' => 'diaria-aprovacao-comprovacao']);

        $this->delete('public.auth_item_child', ['parent' => 'usuario-consulta', 'child' => 'diaria-index']);
        $this->delete('public.auth_item_child', ['parent' => 'usuario-consulta', 'child' => 'diaria-view']);
        $this->delete('public.auth_item_child', ['parent' => 'usuario-consulta', 'child' => 'diaria-arquivadas']);
        $this->delete('public.auth_item_child', ['parent' => 'usuario-consulta', 'child' => 'diaria-comprovacao']);
        $this->delete('public.auth_item_child', ['parent' => 'usuario-consulta', 'child' => 'diaria-alterar-comprovacao']);

        $this->dropColumn('public.auth_item', 'link');
        $this->dropColumn('public.auth_item', 'sistema_menu');

        $this->dropForeignKey('menu_sitema', 'public.menu_sistema');
        $this->dropTable('public.menu_sistema');

        $this->dropForeignKey('status_sistema', 'public.sistema');

        $this->dropForeignKey('public_sistema', 'public.auth_assignment');
        $this->dropColumn('public.auth_assignment', 'sistema_id');

        $this->dropTable('public.status');

        $this->dropTable('public.sistema');
    }
}
