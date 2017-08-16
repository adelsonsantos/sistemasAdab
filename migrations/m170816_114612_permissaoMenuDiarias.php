<?php

use yii\db\Migration;

class m170816_114612_permissaoMenuDiarias extends Migration
{
    const PERFIL     = 1;
    const ACESSO     = 2;
    const CADASTRO   = 1;
    const FINANCEIRO = 3;
    const DRM        = 4;
    const PERMISSOES = 5;
    const CONSULTA   = 6;
    const RELATORIO  = 7;


    public function safeUp()
    {

       $this->batchInsert('public.auth_item',
                ['name',                                'type',        'description',                   'link',                                     'sistema_menu'],
            [
                ['diaria-cadastro-meio-transporte',     $this::ACESSO, 'Meio de Transporte',            '/diarias-cadastro-meio-transporte/index',  $this::CADASTRO],
                ['diaria-cadastro-motivo',              $this::ACESSO, 'Motivo',                        '/diarias-cadastro-motivo/index',           $this::CADASTRO],
                ['diaria-cadastro-submotivo',           $this::ACESSO, 'SubMotivo',                     '/diarias-cadastro-submotivo/index',        $this::CADASTRO],
                ['diaria-financeiro-executar-ordem',    $this::ACESSO, 'Executar Ordem',                '/diaria-financeiro-executar-ordem/index',  $this::FINANCEIRO],
                ['diaria-financeiro-arquivar',          $this::ACESSO, 'Arquivar',                      '/diaria-financeiro-arquivar/index',        $this::FINANCEIRO],
                ['diaria-drm-projeto',                  $this::ACESSO, 'Projeto',                       '/diaria-drm-projeto/index',                $this::DRM],
                ['diaria-drm-produto',                  $this::ACESSO, 'Produto',                       '/diaria-drm-produto/index',                $this::DRM],
                ['diaria-drm-territorio',               $this::ACESSO, 'Território',                    '/diaria-drm-territorio/index',             $this::DRM],
                ['diaria-drm-fonte',                    $this::ACESSO, 'Fonte',                         '/diaria-drm-fonte/index',                  $this::DRM],
                ['diaria-drm-associar-drm',             $this::ACESSO, 'Associar DRM',                  '/diaria-drm-associar-drm/index',           $this::DRM],
                ['diaria-drm-listagem-drm',             $this::ACESSO, 'Listagem DRM',                  '/diaria-drm-listagem-drm/index',           $this::DRM],
                ['diaria-drm-saldo-recursos',           $this::ACESSO, 'Saldo e Recursos',              '/diaria-drm-saldo-recursos/index',         $this::DRM],
                ['diaria-drm-saldo-etapa',              $this::ACESSO, 'Saldo de Etapa',                '/diaria-drm-saldo-etapa/index',            $this::DRM],
                ['diaria-permissoes-autorizador',       $this::ACESSO, 'Associar Autorizador por ACP',  '/diaria-permissoes-autorizador/index',     $this::PERMISSOES],
                ['diaria-consulta-geral',               $this::ACESSO, 'Consulta Geral',                '/diaria-consulta-geral/index',             $this::CONSULTA],
                ['diaria-relatorio-por-coordenadoria',  $this::ACESSO, 'Diárias por Coordenadoria',     '/diaria-relatorio-por-coordenadoria/index',$this::RELATORIO],
                ['diaria-relatorio-por-servidor',       $this::ACESSO, 'Diárias por Servidor',          '/diaria-relatorio-por-servidor/index',     $this::RELATORIO],
                ['diaria-relatorio-ticket-refeicao',    $this::ACESSO, 'Ticket Refeição',               '/diaria-relatorio-ticket-refeicao/index',  $this::RELATORIO],
            ]);

        $this->batchInsert('public.auth_item_child',
                ['parent',        'child'],
            [
                ['administrador', 'diaria-cadastro-meio-transporte'],
                ['administrador', 'diaria-cadastro-motivo'],
                ['administrador', 'diaria-cadastro-submotivo'],
                ['administrador', 'diaria-financeiro-executar-ordem'],
                ['administrador', 'diaria-financeiro-arquivar'],
                ['administrador', 'diaria-drm-projeto'],
                ['administrador', 'diaria-drm-produto'],
                ['administrador', 'diaria-drm-territorio'],
                ['administrador', 'diaria-drm-fonte'],
                ['administrador', 'diaria-drm-associar-drm'],
                ['administrador', 'diaria-drm-listagem-drm'],
                ['administrador', 'diaria-drm-saldo-recursos'],
                ['administrador', 'diaria-drm-saldo-etapa'],
                ['administrador', 'diaria-permissoes-autorizador'],
                ['administrador', 'diaria-consulta-geral'],
                ['administrador', 'diaria-relatorio-por-coordenadoria'],
                ['administrador', 'diaria-relatorio-por-servidor'],
                ['administrador', 'diaria-relatorio-ticket-refeicao'],

                ['aprovador', 'diaria-consulta-geral'],
                ['aprovador', 'diaria-relatorio-por-coordenadoria'],

                ['autorizador', 'diaria-consulta-geral'],
                ['autorizador', 'diaria-relatorio-por-coordenadoria'],
                ['autorizador', 'diaria-relatorio-por-servidor'],
                ['autorizador', 'diaria-relatorio-ticket-refeicao'],

                ['consulta-diarias', 'diaria-drm-saldo-recursos'],
                ['consulta-diarias', 'diaria-drm-saldo-etapa'],

                ['empenha-executa', 'diaria-financeiro-executar-ordem'],
                ['empenha-executa', 'diaria-financeiro-arquivar'],
                ['empenha-executa', 'diaria-consulta-geral'],

                ['gestor-orcamento', 'diaria-drm-saldo-recursos'],
                ['gestor-orcamento', 'diaria-drm-saldo-etapa'],
                ['gestor-orcamento', 'diaria-relatorio-por-coordenadoria'],

                ['gestor-despesas', 'diaria-relatorio-por-coordenadoria'],
                ['gestor-despesas', 'diaria-relatorio-por-servidor'],

                ['gestor-diarias', 'diaria-cadastro-meio-transporte'],
                ['gestor-diarias', 'diaria-cadastro-motivo'],
                ['gestor-diarias', 'diaria-cadastro-submotivo'],
                ['gestor-diarias', 'diaria-drm-projeto'],
                ['gestor-diarias', 'diaria-drm-produto'],
                ['gestor-diarias', 'diaria-drm-territorio'],
                ['gestor-diarias', 'diaria-drm-fonte'],
                ['gestor-diarias', 'diaria-drm-associar-drm'],
                ['gestor-diarias', 'diaria-drm-listagem-drm'],
                ['gestor-diarias', 'diaria-permissoes-autorizador'],
                ['gestor-diarias', 'diaria-consulta-geral'],

                ['gestor-financeiro', 'diaria-financeiro-executar-ordem'],
                ['gestor-financeiro', 'diaria-financeiro-arquivar'],
                ['gestor-financeiro', 'diaria-consulta-geral'],

                ['gestor-orcamentario', 'diaria-drm-projeto'],
                ['gestor-orcamentario', 'diaria-drm-produto'],
                ['gestor-orcamentario', 'diaria-drm-territorio'],
                ['gestor-orcamentario', 'diaria-drm-fonte'],
                ['gestor-orcamentario', 'diaria-drm-associar-drm'],
                ['gestor-orcamentario', 'diaria-drm-listagem-drm'],
                ['gestor-orcamentario', 'diaria-consulta-geral'],

                ['pre-autorizador', 'diaria-consulta-geral'],
                ['pre-autorizador', 'diaria-relatorio-por-coordenadoria'],

                ['pre-liquidante', 'diaria-financeiro-executar-ordem'],
                ['pre-liquidante', 'diaria-financeiro-arquivar'],
                ['pre-liquidante', 'diaria-consulta-geral'],

                ['recursos-humanos', 'diaria-relatorio-ticket-refeicao'],

                ['solicitante', 'diaria-consulta-geral'],

                ['usuario-consulta', 'diaria-consulta-geral'],
            ]
        );
    }

    public function safeDown()
    {
        $this->delete('public.auth_item', ['name' => 'diaria-cadastro-meio-transporte']);
        $this->delete('public.auth_item', ['name' => 'diaria-cadastro-motivo']);
        $this->delete('public.auth_item', ['name' => 'diaria-cadastro-submotivo']);
        $this->delete('public.auth_item', ['name' => 'diaria-financeiro-executar-ordem']);
        $this->delete('public.auth_item', ['name' => 'diaria-financeiro-arquivar']);
        $this->delete('public.auth_item', ['name' => 'diaria-drm-projeto']);
        $this->delete('public.auth_item', ['name' => 'diaria-drm-produto']);
        $this->delete('public.auth_item', ['name' => 'diaria-drm-territorio']);
        $this->delete('public.auth_item', ['name' => 'diaria-drm-fonte']);
        $this->delete('public.auth_item', ['name' => 'diaria-drm-associar-drm']);
        $this->delete('public.auth_item', ['name' => 'diaria-drm-listagem-drm']);
        $this->delete('public.auth_item', ['name' => 'diaria-drm-saldo-recursos']);
        $this->delete('public.auth_item', ['name' => 'diaria-drm-saldo-etapa']);
        $this->delete('public.auth_item', ['name' => 'diaria-permissoes-autorizador']);
        $this->delete('public.auth_item', ['name' => 'diaria-consulta-geral']);
        $this->delete('public.auth_item', ['name' => 'diaria-relatorio-por-coordenadoria']);
        $this->delete('public.auth_item', ['name' => 'diaria-relatorio-por-servidor']);
        $this->delete('public.auth_item', ['name' => 'diaria-relatorio-ticket-refeicao']);

        $this->delete('public.auth_item_child', ['parent' => 'administrador', 'child' => 'diaria-cadastro-meio-transporte']);
        $this->delete('public.auth_item_child', ['parent' => 'administrador', 'child' => 'diaria-cadastro-motivo']);
        $this->delete('public.auth_item_child', ['parent' => 'administrador', 'child' => 'diaria-cadastro-submotivo']);
        $this->delete('public.auth_item_child', ['parent' => 'administrador', 'child' => 'diaria-financeiro-executar-ordem']);
        $this->delete('public.auth_item_child', ['parent' => 'administrador', 'child' => 'diaria-financeiro-arquivar']);
        $this->delete('public.auth_item_child', ['parent' => 'administrador', 'child' => 'diaria-drm-projeto']);
        $this->delete('public.auth_item_child', ['parent' => 'administrador', 'child' => 'diaria-drm-produto']);
        $this->delete('public.auth_item_child', ['parent' => 'administrador', 'child' => 'diaria-drm-territorio']);
        $this->delete('public.auth_item_child', ['parent' => 'administrador', 'child' => 'diaria-drm-fonte']);
        $this->delete('public.auth_item_child', ['parent' => 'administrador', 'child' => 'diaria-drm-associar-drm']);
        $this->delete('public.auth_item_child', ['parent' => 'administrador', 'child' => 'diaria-drm-listagem-drm']);
        $this->delete('public.auth_item_child', ['parent' => 'administrador', 'child' => 'diaria-drm-saldo-recursos']);
        $this->delete('public.auth_item_child', ['parent' => 'administrador', 'child' => 'diaria-drm-saldo-etapa']);
        $this->delete('public.auth_item_child', ['parent' => 'administrador', 'child' => 'diaria-permissoes-autorizador']);
        $this->delete('public.auth_item_child', ['parent' => 'administrador', 'child' => 'diaria-consulta-geral']);
        $this->delete('public.auth_item_child', ['parent' => 'administrador', 'child' => 'diaria-relatorio-por-coordenadoria']);
        $this->delete('public.auth_item_child', ['parent' => 'administrador', 'child' => 'diaria-relatorio-por-servidor']);
        $this->delete('public.auth_item_child', ['parent' => 'administrador', 'child' => 'diaria-relatorio-ticket-refeicao']);

        $this->delete('public.auth_item_child', ['parent' => 'aprovador', 'child' => 'diaria-consulta-geral']);
        $this->delete('public.auth_item_child', ['parent' => 'aprovador', 'child' => 'diaria-relatorio-por-coordenadoria']);

        $this->delete('public.auth_item_child', ['parent' => 'autorizador', 'child' => 'diaria-consulta-geral']);
        $this->delete('public.auth_item_child', ['parent' => 'autorizador', 'child' => 'diaria-relatorio-por-coordenadoria']);
        $this->delete('public.auth_item_child', ['parent' => 'autorizador', 'child' => 'diaria-relatorio-por-servidor']);
        $this->delete('public.auth_item_child', ['parent' => 'autorizador', 'child' => 'diaria-relatorio-ticket-refeicao']);

        $this->delete('public.auth_item_child', ['parent' => 'consulta-diarias', 'child' => 'diaria-drm-saldo-recursos']);
        $this->delete('public.auth_item_child', ['parent' => 'consulta-diarias', 'child' => 'diaria-drm-saldo-etapa']);

        $this->delete('public.auth_item_child', ['parent' => 'empenha-executa', 'child' => 'diaria-financeiro-executar-ordem']);
        $this->delete('public.auth_item_child', ['parent' => 'empenha-executa', 'child' => 'diaria-financeiro-arquivar']);
        $this->delete('public.auth_item_child', ['parent' => 'empenha-executa', 'child' => 'diaria-consulta-geral']);

        $this->delete('public.auth_item_child', ['parent' => 'gestor-orcamento', 'child' => 'diaria-drm-saldo-recursos']);
        $this->delete('public.auth_item_child', ['parent' => 'gestor-orcamento', 'child' => 'diaria-drm-saldo-etapa']);
        $this->delete('public.auth_item_child', ['parent' => 'gestor-orcamento', 'child' => 'diaria-relatorio-por-coordenadoria']);

        $this->delete('public.auth_item_child', ['parent' => 'gestor-despesas', 'child' => 'diaria-relatorio-por-coordenadoria']);
        $this->delete('public.auth_item_child', ['parent' => 'gestor-despesas', 'child' => 'diaria-relatorio-por-servidor']);

        $this->delete('public.auth_item_child', ['parent' => 'gestor-diarias', 'child' => 'diaria-cadastro-meio-transporte']);
        $this->delete('public.auth_item_child', ['parent' => 'gestor-diarias', 'child' => 'diaria-cadastro-motivo']);
        $this->delete('public.auth_item_child', ['parent' => 'gestor-diarias', 'child' => 'diaria-cadastro-submotivo']);
        $this->delete('public.auth_item_child', ['parent' => 'gestor-diarias', 'child' => 'diaria-drm-projeto']);
        $this->delete('public.auth_item_child', ['parent' => 'gestor-diarias', 'child' => 'diaria-drm-produto']);
        $this->delete('public.auth_item_child', ['parent' => 'gestor-diarias', 'child' => 'diaria-drm-territorio']);
        $this->delete('public.auth_item_child', ['parent' => 'gestor-diarias', 'child' => 'diaria-drm-fonte']);
        $this->delete('public.auth_item_child', ['parent' => 'gestor-diarias', 'child' => 'diaria-drm-associar-drm']);
        $this->delete('public.auth_item_child', ['parent' => 'gestor-diarias', 'child' => 'diaria-drm-listagem-drm']);
        $this->delete('public.auth_item_child', ['parent' => 'gestor-diarias', 'child' => 'diaria-permissoes-autorizador']);
        $this->delete('public.auth_item_child', ['parent' => 'gestor-diarias', 'child' => 'diaria-consulta-geral']);

        $this->delete('public.auth_item_child', ['parent' => 'gestor-financeiro', 'child' => 'diaria-financeiro-executar-ordem']);
        $this->delete('public.auth_item_child', ['parent' => 'gestor-financeiro', 'child' => 'diaria-financeiro-arquivar']);
        $this->delete('public.auth_item_child', ['parent' => 'gestor-financeiro', 'child' => 'diaria-consulta-geral']);

        $this->delete('public.auth_item_child', ['parent' => 'gestor-orcamentario', 'child' => 'diaria-drm-projeto']);
        $this->delete('public.auth_item_child', ['parent' => 'gestor-orcamentario', 'child' => 'diaria-drm-produto']);
        $this->delete('public.auth_item_child', ['parent' => 'gestor-orcamentario', 'child' => 'diaria-drm-territorio']);
        $this->delete('public.auth_item_child', ['parent' => 'gestor-orcamentario', 'child' => 'diaria-drm-fonte']);
        $this->delete('public.auth_item_child', ['parent' => 'gestor-orcamentario', 'child' => 'diaria-drm-associar-drm']);
        $this->delete('public.auth_item_child', ['parent' => 'gestor-orcamentario', 'child' => 'diaria-drm-listagem-drm']);
        $this->delete('public.auth_item_child', ['parent' => 'gestor-orcamentario', 'child' => 'diaria-consulta-geral']);

        $this->delete('public.auth_item_child', ['parent' => 'pre-autorizador', 'child' => 'diaria-consulta-geral']);
        $this->delete('public.auth_item_child', ['parent' => 'pre-autorizador', 'child' => 'diaria-relatorio-por-coordenadoria']);

        $this->delete('public.auth_item_child', ['parent' => 'pre-liquidante', 'child' => 'diaria-financeiro-executar-ordem']);
        $this->delete('public.auth_item_child', ['parent' => 'pre-liquidante', 'child' => 'diaria-financeiro-arquivar']);
        $this->delete('public.auth_item_child', ['parent' => 'pre-liquidante', 'child' => 'diaria-consulta-geral']);

        $this->delete('public.auth_item_child', ['parent' => 'recursos-humanos', 'child' => 'diaria-relatorio-ticket-refeicao']);

        $this->delete('public.auth_item_child', ['parent' => 'solicitante', 'child' => 'diaria-consulta-geral']);

        $this->delete('public.auth_item_child', ['parent' => 'usuario-consulta', 'child' => 'diaria-consulta-geral']);
    }
}
