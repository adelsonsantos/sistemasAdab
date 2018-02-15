<?php

use yii\db\Migration;

/**
 * Class m180118_133647_dados_contato_coordenadoria_gerencia
 */
class m180118_133647_dados_contato_coordenadoria_gerencia extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->batchInsert('portal.gerencia', ['ger_id', 'id_coordenadoria', 'ger_nome'],
            [
                //Barreiras
                [1, 4, 'Barreiras'],
                [2, 4, 'Luís Eduardo Magalhães'],
                [3, 4, 'Formosa do Rio Preto'],
                [4, 4, 'Barra'],
                [5, 4, 'Ibotirama'],

                //Feira de Santana
                [6, 5, 'Feira de Santana'],
                [7, 5, 'Riachão do Jacuípe'],
                [8, 5, 'Ipirá'],
                [9, 5, 'Santo Antônio de Jesus'],
                [10, 5, 'Cruz das Almas'],
                [11, 5, 'Santo Amaro'],

                //Guanambi
                [12, 12, 'Guanambi'],
                [13, 12, 'Caetité'],
                [14, 12, 'Condeúba'],
                [15, 12, 'Caculé'],
                [16, 12, 'Livramento de Nossa Senhora'],
                [17, 12, 'Macaúbas'],

                //Itaberaba
                [18, 8, 'Itaberaba'],
                [19, 8, 'Rui Barbosa'],
                [20, 8, 'Andaraí'],
                [21, 8, 'Seabra'],

                //Itabuna
                [22, 13, 'Itabuna'],
                [23, 13, 'Valença'],
                [24, 13, 'Gandu'],
                [25, 13, 'Ubaitaba'],
                [26, 13, 'Aurelino Leal'],
                [27, 13, 'Ilhéus'],
                [28, 13, 'Camacã'],

                //Itapetinga
                [29, 14, 'Itapetinga'],
                [30, 14, 'Itarantim'],
                [31, 14, 'Ibicuí'],

                //Ireçê
                [32, 9, 'Ireçê'],
                [33, 9, 'Canarana'],
                [34, 9, 'Xique-xique'],

                //Jequié
                [35, 1, 'Jequié'],
                [36, 1, 'Ipiaú'],
                [37, 1, 'Maracás'],
                [38, 1, 'Amargosa'],
                [39, 1, 'Jaguaquara'],

                //juazeiro
                [40, 10, 'juazeiro'],
                [41, 10, 'Remanso'],
                [42, 10, 'Senhor do Bonfim'],
                [43, 10, 'Queimadas'],
                [44, 10, 'Uauá'],

                //Miguel Calmon
                [45, 11, 'Miguel Calmon'],
                [46, 11, 'Mundo Novo'],
                [47, 11, 'Jacobina'],
                [48, 11, 'Morro do Chapéu'],

                //Paulo Afonso
                [49, 7, 'Paulo Afonso'],
                [50, 7, 'Jeremoabo'],
                [51, 7, 'Abaré'],

                //Ribeira do Pombal
                [52, 3, 'Ribeira do Pombal'],
                [53, 3, 'Nova Soure'],
                [54, 3, 'Entre Rios'],
                [55, 3, 'Alagoinhas'],
                [56, 3, 'Serrinha'],
                [57, 3, 'Valente'],
                [58, 3, 'Euclides da Cunha'],

                //Santa Maria da Vitória
                [59, 6, 'Santa Maria da Vitória'],
                [60, 6, 'Cocos'],
                [61, 6, 'Bom Jesus da Lapa'],
                [62, 6, 'Santana'],

                //Teixeira de Freitas
                [63, 15, 'Teixeira de Freitas'],
                [64, 15, 'Eunápolis'],
                [65, 15, 'Itanhém'],
                [66, 15, 'Itamarajú'],

                //Vitória da Conquista
                [67, 2, 'Vitória da Conquista'],
                [68, 2, 'Poções'],
                [69, 2, 'Brumado'],
                [70, 2, 'Barra da Estiva']
            ]);

        $this->batchInsert('portal.escritorio', ['esc_id', 'id_coordenadoria', 'ger_id', 'esc_nome'],
            [
                //Coordenadoria Barreiras
                //Gerencia da Barreiras
                [1, 4, 1, 'Angical'],
                [2, 4, 1, 'Riachão das Neves'],
                [3, 4, 1, 'Cristópolis'],
                [4, 4, 1, 'Baianópolis'],
                [5, 4, 1, 'Catolândia'],
                [6, 4, 1, 'Cotegipe'],


                //Coordenadoria Barreiras
                //Gerencia da Luís Eduardo Magalhães
                [7, 4, 2, 'São Desidério'],


                //Coordenadoria Barreiras
                //Gerencia da Formosa do Rio Preto
                [8, 4, 3, 'Mansidão'],
                [9, 4, 3, 'Santa Rita de Cássia'],


                //Coordenadoria Barreiras
                //Gerencia da Barra
                [10, 4, 4, 'Morpará'],
                [11, 4, 4, 'Buritirama'],


                //Coordenadoria Barreiras
                //Gerencia da Ibotirama
                [12, 4, 5, 'Muquém do São Francisco'],
                [13, 4, 5, 'Wanderley'],
                [14, 4, 5, 'Ipupiara'],
                [15, 4, 5, 'Paratinga'],
                [16, 4, 5, 'Brotas de Macaúbas'],


                //Coordenadoria Feira de Santana
                //Gerencia da Feira de Santana
                [17, 5, 6, 'Antônio Cardoso'],
                [18, 5, 6, 'Anguera'],
                [19, 5, 6, 'Coração de Maria'],
                [20, 5, 6, 'Santa Bárbara'],
                [21, 5, 6, 'Irará'],
                [22, 5, 6, 'Santanópolis'],
                [23, 5, 6, 'Conceição de Feira'],
                [24, 5, 6, 'São Gonçalo dos Campos'],


                //Coordenadoria Feira de Santana
                //Gerencia da Riachão do Jacuípe
                [25, 5, 7, 'Ichú'],
                [26, 5, 7, 'Candeal'],
                [27, 5, 7, 'Tanquinho'],
                [28, 5, 7, 'Nova Fátima'],
                [29, 5, 7, 'Capela do A. Alegre'],
                [30, 5, 7, 'Gavião'],
                [31, 5, 7, 'Pé de Serra'],


                //Coordenadoria Feira de Santana
                //Gerencia da Ipirá
                [32, 5, 8, 'Serra Preta'],
                [33, 5, 8, 'Santo Estevão'],
                [34, 5, 8, 'Ipecaetá'],
                [35, 5, 8, 'Rafael Jambeiro'],
                [36, 5, 8, 'Pintadas'],
                [37, 5, 8, 'Baixa Grande'],

                //Coordenadoria Feira de Santana
                //Gerencia da Santo Antônio de Jesus
                [38, 5, 9, 'Itatim'],
                [39, 5, 9, 'Castro Alves'],
                [40, 5, 9, 'Santa Terezinha'],
                [41, 5, 9, 'Elísio Medrado'],
                [42, 5, 9, 'Dom Macedo Costa'],
                [43, 5, 9, 'Muniz Ferreira'],
                [44, 5, 9, 'Nazaré'],
                [45, 5, 9, 'Aratuípe'],
                [46, 5, 9, 'Jaguaribe'],
                [47, 5, 9, 'Vera Cruz'],
                [48, 5, 9, 'Salinas das Margaridas'],
                [49, 5, 9, 'Varzedo'],
                [50, 5, 9, 'Itaparica'],


                //Coordenadoria Feira de Santana
                //Gerencia da Cruz das Almas
                [51, 5, 10, 'Cabaceiras do Paraguaçu'],
                [52, 5, 10, 'Governador Mangabeira'],
                [53, 5, 10, 'Muritiba'],
                [54, 5, 10, 'São Félix'],
                [55, 5, 10, 'Maragojipe'],
                [56, 5, 10, 'Sapeaçu'],
                [57, 5, 10, 'Cachoeira'],
                [58, 5, 10, 'São Felipe'],
                [59, 5, 10, 'Conceição do Almeida'],


                //Coordenadoria Feira de Santana
                //Gerencia da Santo Amaro
                [60, 5, 11, 'São Francisco do Conde'],
                [61, 5, 11, 'Conceição do Jacuípe'],
                [62, 5, 11, ' Amélia Rodrigues'],
                [63, 5, 11, 'Teodoro Sampaio'],
                [64, 5, 11, 'Saubara'],
                [65, 5, 11, 'Terra Nova'],
                [66, 5, 11, 'Madre de Deus'],


                //Coordenadoria Guanambí
                //Gerencia da Guanambí
                [67, 12, 12, 'Sebastião Laranjeiras'],
                [68, 12, 12, 'Iuiu'],
                [69, 12, 12, 'Malhada'],
                [70, 12, 12, 'Urandi'],
                [71, 12, 12, 'Pindaí'],
                [72, 12, 12, 'Palmas de Monte Alto'],
                [73, 12, 12, 'Candiba'],
                [74, 12, 12, 'Matina'],


                //Coordenadoria Guanambí
                //Gerencia da Caetité
                [75, 12, 13, 'Tanque Novo'],
                [76, 12, 13, 'Botuporã'],
                [77, 12, 13, 'Lagoa Real'],
                [78, 12, 13, 'Igaporã'],

                //Coordenadoria Guanambí
                //Gerencia da Condeúba
                [79, 12, 14, 'Maetinga'],
                [80, 12, 14, 'Piripá'],
                [81, 12, 14, 'Pres.Jânio Quadros'],
                [82, 12, 14, 'Cordeiros'],


                //Coordenadoria Guanambí
                //Gerencia da Caculé
                [83, 12, 15, 'Ibiassucê'],
                [84, 12, 15, 'Licínio de Almeida'],
                [85, 12, 15, 'Jacarací'],


                //Coordenadoria Guanambí
                //Gerencia da Livramento de Nossa
                [86, 12, 16, 'Dom Basílio'],
                [87, 12, 16, 'Rio de Contas'],
                [88, 12, 16, 'Jussiape'],
                [89, 12, 16, 'Abaíra'],
                [90, 12, 16, 'Piatã'],

                //Coordenadoria Guanambí
                //Gerencia da Macaúbas
                [91, 12, 17, 'Boquira'],
                [92, 12, 17, 'Ibipitanga'],
                [93, 12, 17, 'Rio do Pires'],
                [94, 12, 17, 'Caturama'],
                [95, 12, 17, 'Paramirim'],
                [96, 12, 17, 'Érico Cardoso'],
                [97, 12, 17, 'Oliveira dos Brejinhos'],


                //Coordenadoria Itaberaba
                //Gerencia da Itaberaba
                [98, 8, 18, 'Iaçu'],
                [99, 8, 18, 'Boa Vista do Tupim'],
                [100, 8, 18, 'Marcionílio Souza'],
                [101, 8, 18, 'Ibiquera'],


                //Coordenadoria Itaberaba
                //Gerencia Rui Barbosa
                [102, 8, 19, 'Macajuba'],
                [103, 8, 19, 'Lajedinho'],
                [104, 8, 19, 'Wagner'],
                [105, 8, 19, 'Bonito'],
                [106, 8, 19, 'Utinga'],


                //Coordenadoria Itaberaba
                //Gerencia Andaraí
                [107, 8, 20, 'Nova Redenção'],
                [108, 8, 20, 'Mucugê'],
                [109, 8, 20, 'Lençóis'],
                [110, 8, 20, 'Itaetê'],


                //Coordenadoria Itaberaba
                //Gerencia Seabra
                [111, 8, 21, 'Souto Soares'],
                [112, 8, 21, 'Iraquara'],
                [113, 8, 21, 'Novo Horizonte'],
                [114, 8, 21, 'Ibitiara'],
                [115, 8, 21, 'Boninal'],
                [116, 8, 21, 'Palmeiras'],


                //Coordenadoria Itabuna
                //Gerencia Itabuna
                [117, 13, 22, 'Buerarema'],
                [118, 13, 22, 'São José da Vitória'],
                [119, 13, 22, 'Barro Preto'],
                [120, 13, 22, 'Itapé'],
                [121, 13, 22, 'Ibicaraí'],
                [122, 13, 22, 'Floresta Azul'],


                //Coordenadoria Itabuna
                //Gerencia Valença
                [123, 13, 23, 'Cairu'],
                [124, 13, 23, 'Taperoá'],
                [125, 13, 23, 'Nilo Peçanha'],
                [126, 13, 23, 'Ituberá'],
                [127, 13, 23, 'Igrapiuna'],
                [128, 13, 23, 'Camamu'],


                //Coordenadoria Itabuna
                //Gerencia Gandu
                [129, 13, 24, 'Trancredo Neves'],
                [130, 13, 24, 'Teolândia'],
                [131, 13, 24, 'Wenceslau Guimarães'],
                [132, 13, 24, 'Itamarí'],
                [133, 13, 24, 'Piraí do Norte'],
                [134, 13, 24, 'Nova Ibiá'],


                //Coordenadoria Itabuna
                //Gerencia Ubaitaba
                [135, 13, 25, 'Ibirapitanga'],
                [136, 13, 25, 'Maraú'],
                [137, 13, 25, 'Ubatã'],
                [138, 13, 25, 'Barra do Rocha'],


                //Coordenadoria Itabuna
                //Gerencia Aurelino Leal
                [139, 13, 26, 'Coarací'],
                [140, 13, 26, 'Almadina'],
                [141, 13, 26, 'Gongogí'],
                [142, 13, 26, 'Itapitanga'],


                //Coordenadoria Itabuna
                //Gerencia Ilhéus
                [143, 13, 27, 'Itacaré'],
                [144, 13, 27, 'Uruçuca'],
                [145, 13, 27, 'Itajuípe'],
                [146, 13, 27, 'Una'],
                [147, 13, 27, 'Canavieiras'],


                //Coordenadoria Itabuna
                //Gerencia Camacã
                [148, 13, 28, 'Itaju do Colônia'],
                [149, 13, 28, 'Pau Brasil'],
                [150, 13, 28, 'Jussarí'],
                [151, 13, 28, 'Arataca'],
                [152, 13, 28, 'Santa Luzia'],
                [153, 13, 28, 'Mascote'],


                //Coordenadoria Itapetinga
                //Gerencia Itapetinga
                [154, 14, 29, 'Caatiba'],
                [155, 14, 29, 'Itambé'],
                [156, 14, 29, 'Ribeirão do Largo'],
                [157, 14, 29, 'Itororó'],


                //Coordenadoria Itapetinga
                //Gerencia Itarantim
                [158, 14, 30, 'Potiraguá'],
                [159, 14, 30, 'Maiquinique'],
                [160, 14, 30, 'Macaraní'],


                //Coordenadoria Itapetinga
                //Gerencia Ibicuí
                [161, 14, 31, 'Firmino Alves'],
                [162, 14, 31, 'Iguaí'],
                [163, 14, 31, 'Santa Cruz da Vitória'],
                [164, 14, 31, 'Nova Canaã'],


                //Coordenadoria Irecê
                //Gerencia Irecê
                [165, 9, 32, 'Central'],
                [166, 9, 32, 'Presidente Dutra'],
                [167, 9, 32, 'São Gabriel'],
                [168, 9, 32, 'Lapão'],
                [169, 9, 32, 'João Dourado'],
                [170, 9, 32, 'Uibaí'],
                [171, 9, 32, 'América Dourada'],
                [172, 9, 32, 'Jussara'],


                //Coordenadoria Irecê
                //Gerencia Canarana
                [173, 9, 33, 'Barro Alto'],
                [174, 9, 33, 'Ibipeba'],
                [175, 9, 33, 'Ibititá'],
                [176, 9, 33, 'Barra do Mendes'],


                //Coordenadoria Irecê
                //Gerencia Xique-Xique
                [177, 9, 34, 'Itaguaçu da Bahia'],
                [178, 9, 34, 'Gentio do Ouro'],


                //Coordenadoria Jequié
                //Gerencia Jequié
                [179, 1, 35, 'Lafayete Coutinho'],
                [180, 1, 35, 'Itagí'],
                [181, 1, 35, 'Manoel Vitorino'],
                [182, 1, 35, 'Boa Nova'],
                [183, 1, 35, 'Jitaúna'],


                //Coordenadoria Jequié
                //Gerencia Ipiaú
                [184, 1, 36, 'Ibirataia'],
                [185, 1, 36, 'Aiquara'],
                [186, 1, 36, 'Itagibá'],
                [187, 1, 36, 'Dário Meira'],


                //Coordenadoria Jequié
                //Gerencia Maracás
                [188, 1, 37, 'Lajedo do Tabocal'],
                [189, 1, 37, 'Itiruçu'],
                [190, 1, 37, 'Iramaia'],
                [191, 1, 37, 'Planaltino'],


                //Coordenadoria Jequié
                //Gerencia Amargosa
                [192, 1, 38, 'Brejões'],
                [193, 1, 38, 'Ubaíra'],
                [194, 1, 38, 'São Miguel das Matas'],
                [195, 1, 38, 'Laje'],
                [196, 1, 38, 'Mutuípe'],
                [197, 1, 38, 'Jequiriçá'],


                //Coordenadoria Jequié
                //Gerencia Jaguaquara
                [198, 1, 39, 'Itaquara'],
                [199, 1, 39, 'Irajuba'],
                [200, 1, 39, 'Nova Itarana'],
                [201, 1, 39, 'Milagres'],
                [202, 1, 39, 'Santa Inês'],
                [203, 1, 39, 'Cravolândia'],
                [204, 1, 39, 'Apuarema'],


                //Coordenadoria Juazeiro
                //Gerencia Juazeiro
                [205, 10, 40, 'Sobradinho'],
                [206, 10, 40, 'Sento-Sé'],
                [207, 10, 40, 'Curaçá'],


                //Coordenadoria Juazeiro
                //Gerencia Remanso
                [208, 10, 41, 'Campo Alegre de Lourdes'],
                [209, 10, 41, 'Pilão Arcado'],
                [210, 10, 41, 'Casa Nova'],


                //Coordenadoria Juazeiro
                //Gerencia Senhor do Bonfim
                [211, 10, 42, 'Jaguararí'],
                [212, 10, 42, 'Andorinha'],
                [213, 10, 42, 'Filadélfia'],
                [214, 10, 42, 'Pindobaçu'],
                [215, 10, 42, 'Campo Formoso'],
                [216, 10, 42, 'Antônio Gonçalves'],
                [217, 10, 42, 'Ponto Novo'],


                //Coordenadoria Juazeiro
                //Gerencia Queimadas
                [218, 10, 43, 'Nordestina'],
                [219, 10, 43, 'Cansanção'],
                [220, 10, 43, 'Itiúba'],


                //Coordenadoria Juazeiro
                //Gerencia Uauá
                [221, 10, 44, 'Canudos'],


                //Coordenadoria Miguel Calmon
                //Gerencia Miguel Calmon
                [222, 11, 45, 'S. José do Jacuípe'],
                [223, 11, 45, 'Capim Grosso'],
                [224, 11, 45, 'Serrolândia'],
                [225, 11, 45, 'Quixabeira'],
                [226, 11, 45, 'Várzea do Poço'],


                //Coordenadoria Miguel Calmon
                //Gerencia Mundo Novo
                [227, 11, 46, 'Piritiba'],
                [228, 11, 46, 'Tapiramutá'],
                [229, 11, 46, 'Mairi'],
                [230, 11, 46, 'Várzea da Roça'],


                //Coordenadoria Miguel Calmon
                //Gerencia Jacobina
                [231, 11, 47, 'Caldeirão Grande'],
                [232, 11, 47, 'Caem'],
                [233, 11, 47, 'Saúde'],
                [234, 11, 47, 'Mirangaba'],


                //Coordenadoria Miguel Calmon
                //Gerencia Morro do Chapéu
                [235, 11, 48, 'Várzea Nova'],
                [236, 11, 48, 'Cafarnaum'],
                [237, 11, 48, 'Mulungu do Morro'],
                [238, 11, 48, 'Umburanas'],
                [239, 11, 48, 'Ourolândia'],


                //Coordenadoria Paulo Afonso
                //Gerencia Paulo Afonso
                [240, 7, 49, 'Santa Brígida'],
                [241, 7, 49, 'Glória'],
                [242, 7, 49, 'Rodelas'],


                //Coordenadoria Paulo Afonso
                //Gerencia Jeremoabo
                [243, 7, 50, 'Pedro Alexandre'],
                [244, 7, 50, 'Cel. João Sá'],
                [245, 7, 50, 'Sítio do Quinto'],


                //Coordenadoria Paulo Afonso
                //Gerencia Abaré
                [246, 7, 51, 'Chorrochó'],
                [247, 7, 51, 'Mucururé'],


                //Coordenadoria Ribeira do Pombal
                //Gerencia Ribeira do Pombal
                [248, 3, 52, 'Banzaê'],
                [249, 3, 52, 'Heliópolis'],
                [250, 3, 52, 'Tucano'],
                [251, 3, 52, 'Fátima'],
                [252, 3, 52, 'Antas'],
                [253, 3, 52, 'Paripiranga'],
                [254, 3, 52, 'Adustina'],
                [255, 3, 52, 'Cícero Dantas'],


                //Coordenadoria Ribeira do Pombal
                //Gerencia Nova Soure
                [256, 3, 53, 'Cipó'],
                [257, 3, 53, 'Itapicuru'],
                [258, 3, 53, 'Ribeira do Amparo'],
                [259, 3, 53, 'Olindina'],


                //Coordenadoria Ribeira do Pombal
                //Gerencia Entre Rios
                [260, 3, 54, 'Crisópolis'],
                [261, 3, 54, 'Jandaíra'],
                [262, 3, 54, 'Acajutiba'],
                [263, 3, 54, 'Conde'],
                [264, 3, 54, 'Cardeal da Silva'],
                [265, 3, 54, 'Esplanada'],
                [266, 3, 54, 'Aporá'],
                [267, 3, 54, 'Rio Real'],


                //Coordenadoria Ribeira do Pombal
                //Gerencia Alagoinhas
                [268, 3, 55, 'Sátiro Dias'],
                [269, 3, 55, 'Inhambupe'],
                [270, 3, 55, 'Ouriçangas'],
                [271, 3, 55, 'Aramari'],
                [272, 3, 55, 'Pedrão'],
                [273, 3, 55, 'Araçás'],
                [274, 3, 55, 'Catu'],
                [275, 3, 55, 'Pojuca'],
                [276, 3, 55, 'Itanagra'],


                //Coordenadoria Ribeira do Pombal
                //Gerencia Serrinha
                [277, 3, 56, 'Teofilândia'],
                [278, 3, 56, 'Biritinga'],
                [279, 3, 56, 'Lamarão'],
                [280, 3, 56, 'Água Fria'],
                [281, 3, 56, 'Barrocas'],
                [282, 3, 56, 'Aracy'],


                //Coordenadoria Ribeira do Pombal
                //Gerencia Valente
                [283, 3, 57, 'São Domingos'],
                [284, 3, 57, 'Retirolândia'],
                [285, 3, 57, 'Conceição do Coité'],
                [286, 3, 57, 'Santa Luz'],


                //Coordenadoria Ribeira do Pombal
                //Gerencia Euclides da Cunha
                [287, 3, 58, 'Monte Santo'],
                [288, 3, 58, 'Quijingue'],


                //Coordenadoria Santa Maria da Vitória
                //Gerencia Santa Maria da Vitória
                [289, 6, 59, 'Correntina'],
                [290, 6, 59, 'São Félix do Coribe'],


                //Coordenadoria Santa Maria da Vitória
                //Gerencia Cocos
                [291, 6, 60, 'Jaborandi'],
                [292, 6, 60, 'Coribe'],
                [293, 6, 60, 'Feira da Mata'],


                //Coordenadoria Santa Maria da Vitória
                //Gerencia Bom Jesus da Lapa
                [294, 6, 61, 'Riacho de Santana'],
                [295, 6, 61, 'Serra do Ramalho'],
                [296, 6, 61, 'Sítio do Mato'],
                [297, 6, 61, 'Carinhanha'],


                //Coordenadoria Santa Maria da Vitória
                //Gerencia Santana
                [298, 6, 62, 'Serra Dourada'],
                [299, 6, 62, 'Brejolândia'],
                [300, 6, 62, 'Tabocas do Brejo Velho'],
                [301, 6, 62, 'Canápolis'],


                //Coordenadoria Teixeira de Freitas
                //Gerencia Teixeira de Freitas
                [302, 15, 63, 'Caravelas'],
                [303, 15, 63, 'Alcobaça'],
                [304, 15, 63, 'Nova Viçosa'],
                [305, 15, 63, 'Mucurí'],

                //Coordenadoria Teixeira de Freitas
                //Gerencia Eunápolis
                [306, 15, 64, 'Itagimirim'],
                [307, 15, 64, 'Itapebi'],
                [308, 15, 64, 'Belmonte'],
                [309, 15, 64, 'Porto Seguro'],
                [310, 15, 64, 'Santa Cruz de Cabrália'],
                [311, 15, 64, 'Itabela'],
                [312, 15, 64, 'Guaratinga'],


                //Coordenadoria Teixeira de Freitas
                //Gerencia Itanhém
                [313, 15, 65, 'Medeiros Neto'],
                [314, 15, 65, 'Lajedão'],
                [315, 15, 65, 'Ibirapoã'],
                [316, 15, 65, 'Vereda'],


                //Coordenadoria Teixeira de Freitas
                //Gerencia Itamarajú
                [317, 15, 66, 'Jucuruçu'],
                [318, 15, 66, 'Prado'],


                //Coordenadoria Vitória da Conquista
                //Gerencia Vitória da Conquista
                [319, 2, 67, 'Anagé'],
                [320, 2, 67, 'Caraíbas'],
                [321, 2, 67, 'Tremedal'],
                [322, 2, 67, 'Barra do Choça'],
                [323, 2, 67, 'Cândido Sales'],
                [324, 2, 67, 'Encruzilhada'],
                [325, 2, 67, 'Belo Campo'],


                //Coordenadoria Vitória da Conquista
                //Gerencia Poções
                [326, 2, 68, 'Planalto'],
                [327, 2, 68, 'Mirante'],
                [328, 2, 68, 'Bom Jesus da Serra'],
                [329, 2, 68, 'Caetanos'],


                //Coordenadoria Vitória da Conquista
                //Gerencia Brumado
                [330, 2, 69, 'Aracatu'],
                [331, 2, 69, 'Malhada de Pedra'],
                [332, 2, 69, 'Rio do Antônio'],


                //Coordenadoria Vitória da Conquista
                //Gerencia Barra da Estiva
                [333, 2, 70, 'Ibicoara'],
                [334, 2, 70, 'Ituaçu'],
                [335, 2, 70, 'Tanhaçu'],
                [336, 2, 70, 'Contendas do Sincorá'],
            ]);

        $this->batchInsert('portal.contato_tipo', ['cti_id', 'cti_nome'],
            [
                [1, 'Coordenadoria'],
                [2, 'Gerência'],
                [3, 'Escritório']
        ]);


        $this->batchInsert('portal.contato', ['con_id', 'con_nome', 'con_telefone', 'con_ddd', 'cti_id'],
            [
                //Barreiras
                [1, ' ', '3612-3400', '77', 1],
                [2, ' ', '3612-4350', '77', 1],
                [3, ' ', '3628-5117', '77', 2],
                [4, ' ', '3616-2286', '77', 2],
                [5, ' ', '3662-3913', '77', 2],
                [6, ' ', '3698-1140', '77', 2],

                //Barreiras
                [7, ' ', '3622-2066', '77', 3],  //Angical
                [8, ' ', '3624-2600', '77', 3],  //Riachão das Neves
                [9, ' ', '3618-1320', '77', 3],  //Cristópolis
                [10, ' ', '3617-2397', '77', 3], //Baianópolis
                [11, ' ', '3619-2029', '77', 3], //Catolândia
                [12, ' ', '3621-2516', '77', 3], //Cotegipe

                //Luís Eduardo Magalhães
                [13, ' ', '3623-2157', '77', 3], //	São Desidério

                //Formosa do Rio Preto
                [14, ' ', '3641-2085', '77', 3], //	Mansidão
                [15, ' ', '3625-2438', '77', 3], //	Santa Rita de Cássia

                //Barra
                [16, ' ', '3663-2156', '77', 3], //	Morpará
                [17, ' ', '3442-2520', '77', 3], //	Buritirama

                //Ibotirama
                [18, ' ', '3652-5115', '77', 3], //	Muquém do São Francisco
                [19, ' ', '3626-1415', '77', 3], //	Wanderley
                [20, ' ', '3646-1286', '77', 3], //	Ipupiara
                [21, ' ', '3664-2121', '77', 3], //	Paratinga
                [22, ' ', '3644-2150', '77', 3], //	Brotas de Macaúbas


                //Feira de Santana
                [23, ' ', '3623-3460', '75', 1],
                [24, ' ', '3623-4164', '75', 1],
                [25, ' ', '3264-1008', '75', 2],
                [26, ' ', '3254-1311', '75', 2],
                [27, ' ', '3631-7423', '75', 2],
                [28, ' ', '3621-3070', '75', 2],
                [29, ' ', '3241-4139', '75', 2],

                //Feira de Santana
                [30, ' ', '3230-2111', '75', 3], //Antônio Cardoso
                [31, ' ', '3239-2162', '75', 3], //Anguera
                [32, ' ', '3248-2248', '75', 3], //Coração de Maria
                [33, ' ', '3236-2614', '75', 3], //Santa Bárbara
                [34, ' ', '3247-2728', '75', 3], //Irará
                [35, ' ', '3694-2233', '75', 3], //Santanópolis
                [36, ' ', '3244-2735', '75', 3], //Conceição de Feira
                [37, ' ', '3246-1601', '75', 3], //São Gonçalo dos Campos

                //Riachão do Jacuípe
                [38, ' ', '3284-2122', '75', 3], //Ichú
                [39, ' ', '3235-2248', '75', 3], //Candeal
                [40, ' ', '3249-2158', '75', 3], //Tanquinho
                [41, ' ', '3658-2394', '75', 3], //Nova Fátima
                [42, ' ', '3690-2393', '75', 3], //Capela do A. Alegre
                [43, ' ', '3682-2260', '75', 3], //Gavião
                [44, ' ', '3660-2159', '75', 3], //Pé de Serra

                //Ipirá
                [45, ' ', '3609-1158', '75', 3], //Serra Preta
                [46, ' ', '3245-2072', '75', 3], //Santo Estevão
                [47, ' ', '3685-2113', '75', 3], //Ipecaetá
                [48, ' ', '3680-2034', '75', 3], //Rafael Jambeiro
                [49, ' ', '3693-2119', '75', 3], //Pintadas
                [50, ' ', '3258-1130', '75', 3], //Baixa Grande

                //Santo Antônio de Jesus
                [51, ' ', '3452-2311', '75', 3], //Itatim
                [52, ' ', '3522-1264', '75', 3], //Castro Alves
                [53, ' ', '3639-2404', '75', 3], //Santa Terezinha
                [54, ' ', '3649-2035', '75', 3], //Elísio Medrado
                [55, ' ', '3648-2214', '75', 3], //Dom Macedo Costa
                [56, ' ', '3663-2373', '75', 3], //Muniz Ferreira
                [57, ' ', '3636-1735', '75', 3], //Nazaré
                [58, ' ', '3647-2390', '75', 3], //Aratuípe
                [59, ' ', '3381-1167', '75', 3], //Varzedo

                //Cruz das Almas
                [60, ' ', '8147-3104', '75', 3], //Cabaceiras do Paraguaçu
                [61, ' ', '3638-2233', '75', 3], //Governador Mangabeira
                [62, ' ', '3491-1307', '75', 3], //São Félix
                [63, ' ', '3526-1509', '75', 3], //Maragojipe
                [64, ' ', '3627-2913', '75', 3], //Sapeaçu
                [65, ' ', '3425-4586', '75', 3], //Cachoeira
                [66, ' ', '3628-3306', '75', 3], //São Felipe
                [67, ' ', '3629-3019', '75', 3], //Conceição do Almeida

                //Santo Amaro
                [68, ' ', '3429-1694', '75', 3], //São Francisco do Conde
                [69, ' ', '3243-2009', '75', 3], //Conceição do Jacuípe
                [70, ' ', '3242-2021', '75', 3], // Amélia Rodrigues
                [71, ' ', '3237-2137', '75', 3], //Teodoro Sampaio
                [72, ' ', '3238-9076', '75', 3], //Terra Nova


                //Guanambi
                [73, ' ', '3451-3912', '77', 1],
                [74, ' ', '3451-4063', '77', 1],
                [75, ' ', '3454-2223', '77', 2],
                [76, ' ', '3445-2401', '77', 2],
                [77, ' ', '3455-1261', '77', 2],
                [78, ' ', '3444-2700', '77', 2],
                [79, ' ', '3473-1921', '77', 2],

                //Guanambí
                [80, ' ', '3668-2379', '77', 3],  //Sebastião Laranjeiras
                [81, ' ', '3682-2039', '77', 3],  //Iuiu
                [82, ' ', '3691-2116', '77', 3],  //Malhada
                [83, ' ', '3456-2386', '77', 3],  //Urandi
                [84, ' ', '3667-2375', '77', 3],  //Pindaí
                [85, ' ', '3662-2146', '77', 3],  //Palmas de Monte Alto
                [86, ' ', '3661-2256', '77', 3],  //Candiba
                [87, ' ', '3643-1018', '77', 3],  //Matina

                //Caetité
                [88, ' ', '3695-1185', '77', 3],  //Tanque Novo
                [89, ' ', '3678-2170', '77', 3],  //Botuporã
                [90, ' ', '3477-1166', '77', 3],  //Lagoa Real
                [91, ' ', '3460-1680', '77', 3],  //Igaporã

                //Condeúba
                [92, ' ', '3472-2159', '77', 3],  //Maetinga
                [93, ' ', '3440-2320', '77', 3],  //Piripá
                [94, ' ', '3492-2652', '77', 3],  //Pres.Jânio Quadros
                [95, ' ', '3447-2108', '77', 3],  //Cordeiros

                //Caculé
                [96, ' ', '3465-2503', '77', 3],  //Ibiassucê
                [97, ' ', '3463-6152', '77', 3],  //Licínio de Almeida
                [98, ' ', '3466-2433', '77', 3],  //Jacarací

                //Livramento de Nossa
                [99, ' ', '3448-2377', '77', 3],  //Dom Basílio
                [100, ' ', '3475-2482', '77', 3],  //Rio de Contas
                [101, ' ', '3414-2394', '77', 3],  //Jussiape
                [102, ' ', '3476-2315', '77', 3],  //Abaíra
                [103, ' ', '3479-2015', '77', 3],  //Piatã

                //Macaúbas
                [104, ' ', '3645-2106', '77', 3],  //Boquira
                [105, ' ', '3674-2452', '77', 3],  //Ibipitanga
                [106, ' ', '3693-2183', '77', 3],  //Rio do Pires
                [107, ' ', '3650-1185', '77', 3],  //Caturama
                [108, ' ', '3471-2177', '77', 3],  //Paramirim
                [109, ' ', '3642-2650', '77', 3],  //Oliveira dos Brejinhos

                //Itaberaba
                [110, ' ', '3251-1626', '75', 1],
                [111, ' ', '3251-6131', '75', 1],
                [112, ' ', '3251-2314', '75', 1],
                [113, ' ', '3252-2507', '75', 2],
                [114, ' ', '3335-2090', '75', 2],
                [115, ' ', '3331-1812', '75', 2],

                //Itaberaba
                [116, ' ', '3325-2128', '75', 3],  //Iaçu
                [117, ' ', '3326-2212', '75', 3],  //Boa Vista do Tupim
                [118, ' ', '3340-2050', '75', 3],  //Marcionílio Souza
                [119, ' ', '3328-2173', '75', 3],  //Ibiquera

                //Rui Barbosa
                [120, ' ', '3259-2318', '75', 3],  //Macajuba
                [121, ' ', '3327-2126', '75', 3],  //Lajedinho
                [122, ' ', '3336-2149', '75', 3],  //Wagner
                [123, ' ', '3343-2054', '75', 3],  //Bonito
                [124, ' ', '3337-1438', '75', 3],  //Utinga

                //Andaraí
                [125, ' ', '3345-2048', '75', 3],  //Nova Redenção
                [126, ' ', '3334-2174', '75', 3],  //Mucugê
                [127, ' ', '3334-2174', '75', 3],  //Lençóis
                [128, ' ', '3320-1610', '75', 3],  //Itaetê

                //Seabra
                [129, ' ', '3339-2160', '75', 3],  //Souto Soares
                [130, ' ', '3648-1390', '75', 3],  //Novo Horizonte
                [131, ' ', '3647-2519', '75', 3],  //Ibitiara
                [132, ' ', '3330-2126', '75', 3],  //Boninal
                [133, ' ', '3332-2103', '75', 3],  //Palmeiras

                //Itabuna
                [134, ' ', '3211-7064', '73', 1],
                [135, ' ', '3613-0567', '73', 1],
                [136, ' ', '3641-3627', '73', 2],
                [137, ' ', '3254-1427', '73', 2],
                [138, ' ', '3230-2998', '73', 2],
                [139, ' ', '3554-1084', '73', 2],
                [140, ' ', '3231-1564', '73', 2],
                [141, ' ', '3283-1754', '73', 2],

                //Itabuna
                [142, ' ', '3248-2037', '73', 3], //Itapé
                [143, ' ', '3242-1037', '73', 3], //Ibicaraí
                [144, ' ', '3243-2934', '73', 3], //Floresta Azul

                //Valença
                [145, ' ', '3664-1638', '73', 3], //Taperoá
                [146, ' ', '3257-2275', '73', 3], //Nilo Peçanha
                [147, ' ', '3256-1540', '73', 3], //Ituberá
                [148, ' ', '3255-2136', '73', 3], //Camamu

                //Gandu
                [149, ' ', '3654-2158', '73', 3], //Trancredo Neves
                [150, ' ', '3279-2128', '73', 3], //Teolândia
                [151, ' ', '3278-2534', '73', 3], //Wenceslau Guimarães
                [152, ' ', '3532-1420', '73', 3], //Itamarí
                [153, ' ', '3688-2235', '73', 3], //Piraí do Norte
                [154, ' ', '3653-1233', '73', 3], //Nova Ibiá

                //Ubaitaba
                [155, ' ', '3245-2235', '73', 3], //Ubatã
                [156, ' ', '3502-2576', '73', 3], //Barra do Rocha

                //Aurelino Leal
                [157, ' ', '3241-2310', '73', 3], //Coarací
                [158, ' ', '3247-1293', '73', 3], //Almadina
                [159, ' ', '3240-2058', '73', 3], //Gongogí

                //Ilheus
                [160, ' ', '3234-1427', '73', 3], //Canavieiras

                //Camacã
                [161, ' ', '3204-2017', '73', 3], //Itaju do Colônia
                [162, ' ', '3624-1566', '73', 3], //Jussarí
                [163, ' ', '3628-1114', '73', 3], //Santa Luzia


                //Itapetinga
                [164, ' ', '3261-1719', '77', 1],
                [165, ' ', '3261-1498', '77', 1],
                [166, ' ', '3261-1160', '77', 1],
                [167, ' ', '3266-2139', '77', 2],
                [168, ' ', '3272-2891', '77', 2],

                //Itapetinga
                [169, ' ', '3430-2304', '77', 3], //Caatiba
                [170, ' ', '3432-2563', '77', 3], //Itambé
                [171, ' ', '3478-1228', '77', 3], //Ribeirão do Largo
                [172, ' ', '3265-1660', '73', 3], //Itororó

                //Itarantim
                [173, ' ', '3285-2539', '73', 3], //Potiraguá
                [174, ' ', '3275-2209', '77', 3], //Maiquinique
                [175, ' ', '3274-2219', '77', 3], //Macaraní

                //Ibicuí
                [176, ' ', '8118-6064', '73', 3], //Firmino Alves
                [177, ' ', '3271-2797', '73', 3], //Iguaí
                [178, ' ', '3627-2019', '73', 3], //Santa Cruz da Vitória
                [179, ' ', '3207-2031', '73', 3], //Nova Canaã

                //Irecé
                [180, ' ', '3641-3677', '74', 1],
                [181, ' ', '3641-3591', '74', 1],
                [182, ' ', '3656-2163', '74', 2],
                [183, ' ', '3661-1207', '74', 2],

                //Irecê
                [184, ' ', '3640-1165', '74', 3], //Presidente Dutra
                [185, ' ', '3649-1084', '74', 3], //Uibaí

                //Jequié
                [186, ' ', '3525-2716', '73', 1],
                [187, ' ', '3525-1431', '73', 1],
                [188, ' ', '3525-2708', '73', 1],
                [189, ' ', '3531-3771', '73', 2],
                [190, ' ', '3533-2047', '73', 2],
                [191, ' ', '3634-1470', '73', 2],
                [192, ' ', '3534-1733', '73', 2],

                //Juazeiro
                [193, ' ', '3612-1174', '74', 1],
                [194, ' ', '3612-1877', '74', 1],
                [195, ' ', '3612-1827', '74', 1],
                [196, ' ', '3535-1982', '74', 2],
                [197, ' ', '3541-0507', '74', 2],
                [198, ' ', '3644-1641', '74', 2],
                [199, ' ', '3673-2056', '74', 2],

                //Miguel Calmon
                [200, ' ', '3627-2385', '74', 1],
                [201, ' ', '3627-2353', '74', 1],
                [202, ' ', '3626-2029', '74', 2],
                [203, ' ', '3621-3805', '74', 2],
                [204, ' ', '3653-1430', '74', 2],

                //Miguel Calmon
                [205, ' ', '3651-2780', '74', 3], //Capim Grosso
                [206, ' ', '3631-2769', '74', 3], //Serrolândia
                [207, ' ', '3676-1261', '74', 3], //Quixabeira
                [208, ' ', '3639-2250', '74', 3], //Várzea do Poço

                //Mundo Novo
                [209, ' ', '3628-2252', '74', 3], //Piritiba
                [210, ' ', '3635-2382', '74', 3], //Tapiramutá
                [211, ' ', '3632-2323', '74', 3], //Mairi
                [212, ' ', '8804-3075', '74', 3], //Várzea da Roç

                //Jacobina
                [213, ' ', '3634-2251', '74', 3], //Caldeirão Grande
                [214, ' ', '3636-2419', '74', 3], //Caem
                [215, ' ', '3233-2108', '74', 3], //Saúde
                [216, ' ', '3630-2258', '74', 3], //Mirangaba

                //Paulo Afonso
                [217, ' ', '3281-3231', '75', 1],
                [218, ' ', '3281-4734', '75', 1],
                [219, ' ', '3203-1230', '75', 2],
                [220, ' ', '3287-2438', '75', 2],

                //Paulo Afonso
                [221, ' ', '3698-2074', '75', 3], //Santa Brígida
                [222, ' ', '3656-2170', '75', 3], //Glória
                [223, ' ', '3285-2195', '75', 3], //Rodelas

                //Jeremoabo
                [224, ' ', '3289-2220', '75', 3], //Pedro Alexandre
                [225, ' ', '3296-2243', '75', 3], //Sítio do Quinto

                //Abaré
                [226, ' ', '3477-2010', '75', 3], //Chorrochó
                [227, ' ', '3284-2328', '75', 3], //Mucururé

                //Ribeira do Pombal
                [228, ' ', '3276-4809', '75', 1],
                [229, ' ', '3276-1526', '75', 1],
                [230, ' ', '3437-2321', '75', 2],
                [231, ' ', '3420-3655', '75', 2],
                [232, ' ', '3423-3238', '75', 2],
                [233, ' ', '3261-4820', '75', 2],
                [234, ' ', '3263-2537', '75', 2],
                [235, ' ', '3271-2242', '75', 2],

                //Santa Maria da Vitoria
                [236, ' ', '3483-5112', '77', 1],
                [237, ' ', '3483-1221', '77', 1],
                [238, ' ', '3489-1480', '77', 2],
                [239, ' ', '3481-7791', '77', 2],
                [240, ' ', '3484-3439', '77', 2],

                //Santa Maria da Vitória
                [241, ' ', '3488-3275', '77', 3], //Correntina
                [242, ' ', '3491-1307', '77', 3], //São Félix do Coribe

                //Cocos
                [243, ' ', '3480-2609', '77', 3], //Coribe
                [244, ' ', '3474-1068', '77', 3], //Feira da Mata

                //Bom Jesus da Lapa
                [245, ' ', '3457-2653', '77', 3], //Riacho de Santana
                [246, ' ', '3620-1350', '77', 3], //Serra do Ramalho
                [247, ' ', '3671-2104', '77', 3], //Sítio do Mato
                [248, ' ', '3485-2569', '77', 3], //Carinhanha

                //Santana
                [249, ' ', '3686-2334', '77', 3], //Serra Dourada
                [250, ' ', '3656-2269', '77', 3], //Brejolândia
                [251, ' ', '3657-2230', '77', 3], //Tabocas do Brejo Velho

                //Teixeira de Freitas
                [252, ' ', '3291-7510', '73', 1],
                [253, ' ', '3291-5820', '73', 1],
                [254, ' ', '3281-6734', '73', 2],
                [255, ' ', '3295-2114', '73', 2],
                [256, ' ', '3294-1044', '73', 2],

                //Vitoria da Conquista
                [257, ' ', '3421-7949', '77', 1],
                [258, ' ', '3421-7338', '77', 1],
                [259, ' ', '3431-2142', '77', 2],
                [260, ' ', '3441-3322', '77', 2],
                [261, ' ', '3450-1150', '77', 2]
            ]);

        $this->batchInsert('portal.coordenadoria_gerencia', ['cog_id', 'id_coordenadoria', 'ger_id', 'esc_id', 'con_id'],
            [
                //Barreiras
                [1, 4, null, null, 1],
                [2, 4, null, null, 2],
                [3, 4, 2, null, 3],
                [4, 4, 3, null, 4],
                [5, 4, 4, null, 5],
                [6, 4, 5, null, 6],

                //Coordenadoria Barreiras
                //Gerencia da Barreiras
                [7, 4, 1, 1, 7],   //Angical
                [8, 4, 1, 2, 8],   //Riachão das Neves
                [9, 4, 1, 3, 9],   //Cristópolis
                [10, 4, 1, 4, 10],   //Baianópolis
                [11, 4, 1, 5, 11],   //Catolândia
                [12, 4, 1, 6, 12],   //Cotegipe

                //Coordenadoria Barreiras
                //Gerencia da Luís Eduardo Magalhães
                [13, 4, 2, 7, 13], //São Desidério

                //Coordenadoria Barreiras
                //Gerencia da Formosa do Rio Preto
                [14, 4, 3, 8, 14], //Mansidão
                [15, 4, 3, 9, 15], //Santa Rita de Cássia

                //Coordenadoria Barreiras
                //Gerencia da Barra
                [16, 4, 4, 10, 16], //Morpará
                [17, 4, 4, 11, 17], //Buritirama

                //Coordenadoria Barreiras
                //Gerencia Ibotirama
                [18, 4, 5, 12, 18], //	Muquém do São Francisco
                [19, 4, 5, 13, 19], //	Wanderley
                [20, 4, 5, 14, 20], //	Ipupiara
                [21, 4, 5, 15, 21], //	Paratinga
                [22, 4, 5, 16, 22], //	Brotas de Macaúbas

                //Feira de Santana
                [23, 5, null, null, 23],
                [24, 5, null, null, 24],
                [25, 5, 7, null, 25],
                [26, 5, 8, null, 26],
                [27, 5, 9, null, 27],
                [28, 5, 10, null, 28],
                [29, 5, 11, null, 29],

                //Coordenadoria de Feira de Santana
                //Gerencia Feira de Santana
                [30, 5, 6, 17, 30], //Antônio Cardoso
                [31, 5, 6, 18, 31], //Anguera
                [32, 5, 6, 19, 32], //Coração de Maria
                [33, 5, 6, 20, 33], //Santa Bárbara
                [34, 5, 6, 21, 34], //Irará
                [35, 5, 6, 22, 35], //Santanópolis
                [36, 5, 6, 23, 36], //Conceição de Feira
                [37, 5, 6, 24, 37], //São Gonçalo dos Campos

                //Coordenadoria de Feira de Santana
                //Gerencia Riachão do Jacuípe
                [38, 5, 7, 25, 38], //Ichú
                [39, 5, 7, 26, 39], //Candeal
                [40, 5, 7, 27, 40], //Tanquinho
                [41, 5, 7, 28, 41], //Nova Fátima
                [42, 5, 7, 29, 42], //Capela do A. Alegre
                [43, 5, 7, 30, 43], //Gavião
                [44, 5, 7, 31, 44], //Pé de Serra

                //Coordenadoria de Feira de Santana
                //Gerencia Ipirá
                [45, 5, 8, 32, 45], //Serra Preta
                [46, 5, 8, 33, 46], //Santo Estevão
                [47, 5, 8, 34, 47], //Ipecaetá
                [48, 5, 8, 35, 48], //Rafael Jambeiro
                [49, 5, 8, 36, 49], //Pintadas
                [50, 5, 8, 37, 50], //Baixa Grande

                //Coordenadoria de Feira de Santana
                //Gerencia Santo Antônio de Jesus
                [51, 5, 9, 38, 51], //Itatim
                [52, 5, 9, 39, 52], //Castro Alves
                [53, 5, 9, 40, 53], //Santa Terezinha
                [54, 5, 9, 41, 54], //Elísio Medrado
                [55, 5, 9, 42, 55], //Dom Macedo Costa
                [56, 5, 9, 43, 56], //Muniz Ferreira
                [57, 5, 9, 44, 57], //Nazaré
                [58, 5, 9, 45, 58], //Aratuípe
                [59, 5, 9, 49, 59], //Varzedo

                //Coordenadoria de Feira de Santana
                //Gerencia Cruz das Almas
                [60, 5, 10, 51, 60], //Cabaceiras do Paraguaçu
                [61, 5, 10, 52, 61], //Governador Mangabeira
                [62, 5, 10, 54, 62], //São Félix
                [63, 5, 10, 55, 63], //Maragojipe
                [64, 5, 10, 56, 64], //Sapeaçu
                [65, 5, 10, 57, 65], //Cachoeira
                [66, 5, 10, 58, 66], //São Felipe
                [67, 5, 10, 59, 67], //Conceição do Almeida

                //Coordenadoria de Feira de Santana
                //Gerencia Santo Amaro
                [68, 5, 11, 60, 68], //São Francisco do Conde
                [69, 5, 11, 61, 69], //Conceição do Jacuípe
                [70, 5, 11, 62, 70], // Amélia Rodrigues
                [71, 5, 11, 63, 71], //Teodoro Sampaio
                [72, 5, 11, 65, 72], //Terra Nova

                //Guanambi
                [73, 12, null, null, 73],
                [74, 12, null, null, 74],
                [75, 12, 13, null, 75],
                [76, 12, 14, null, 76],
                [77, 12, 15, null, 77],
                [78, 12, 16, null, 78],
                [79, 12, 17, null, 79],

                //Coordenadoria de Guanambi
                //Gerencia Guanambi
                [80, 12, 12, 67, 80],  //Sebastião Laranjeiras
                [81, 12, 12, 68, 81],  //Iuiu
                [82, 12, 12, 69, 82],  //Malhada
                [83, 12, 12, 70, 83],  //Urandi
                [84, 12, 12, 71, 84],  //Pindaí
                [85, 12, 12, 72, 85],  //Palmas de Monte Alto
                [86, 12, 12, 73, 86],  //Candiba
                [87, 12, 12, 74, 87],  //Matina

                //Coordenadoria de Guanambi
                //Gerencia Caetité
                [88, 12, 13, 75, 88],  //Tanque Novo
                [89, 12, 13, 76, 89],  //Botuporã
                [90, 12, 13, 77, 90],  //Lagoa Real
                [91, 12, 13, 78, 91],  //Igaporã

                //Coordenadoria Guanambí
                //Gerencia da Condeúba
                [92, 12, 14, 79, 92],  //Maetinga
                [93, 12, 14, 80, 93],  //Piripá
                [94, 12, 14, 81, 94],  //Pres.Jânio Quadros
                [95, 12, 14, 82, 95],  //Cordeiros

                //Coordenadoria Guanambí
                //Gerencia da Caculé
                [96, 12, 15, 83, 96],  //Ibiassucê
                [97, 12, 15, 84, 97],  //Licínio de Almeida
                [98, 12, 15, 85, 98],  //Jacarací

                //Coordenadoria Guanambí
                //Gerencia da Livramento de Nossa
                [99, 12, 16, 86, 99],  //Dom Basílio
                [100, 12, 16, 87, 100],  //Rio de Contas
                [101, 12, 16, 88, 101],  //Jussiape
                [102, 12, 16, 89, 102],  //Abaíra
                [103, 12, 16, 90, 103],  //Piatã

                //Coordenadoria Guanambí
                //Gerencia da Macaúbas
                [104, 12, 17, 91, 104],  //Boquira
                [105, 12, 17, 92, 105],  //Ibipitanga
                [106, 12, 17, 93, 106],  //Rio do Pires
                [107, 12, 17, 94, 107],  //Caturama
                [108, 12, 17, 95, 108],  //Paramirim
                [109, 12, 17, 97, 109],  //Oliveira dos Brejinhos

                //Itaberaba
                [110, 8, null, null, 110],
                [111, 8, null, null, 111],
                [112, 8, null, null, 112],
                [113, 8, 19, null, 113],
                [114, 8, 20, null, 114],
                [115, 8, 21, null, 115],

                //Coordenadoria Itaberaba
                //Gerencia da Itaberaba
                [116, 8, 18, 98, 116],  //Iaçu
                [117, 8, 18, 99, 117],  //Boa Vista do Tupim
                [118, 8, 18, 100, 118],  //Marcionílio Souza
                [119, 8, 18, 101, 119],  //Ibiquera

                //Coordenadoria Itaberaba
                //Gerencia Rui Barbosa
                [120, 8, 19, 102, 120],  //Macajuba
                [121, 8, 19, 103, 121],  //Lajedinho
                [122, 8, 19, 104, 122],  //Wagner
                [123, 8, 19, 105, 123],  //Bonito
                [124, 8, 19, 106, 124],  //Utinga

                //Coordenadoria Itaberaba
                //Gerencia Andaraí
                [125, 8, 20, 107, 125],  //Nova Redenção
                [126, 8, 20, 108, 126],  //Mucugê
                [127, 8, 20, 109, 127],  //Lençóis
                [128, 8, 20, 110, 128],  //Itaetê

                //Coordenadoria Itaberaba
                //Gerencia Seabra
                [129, 8, 21, 111, 129],  //Souto Soares
                [130, 8, 21, 113, 130],  //Novo Horizonte
                [131, 8, 21, 114, 131],  //Ibitiara
                [132, 8, 21, 115, 132],  //Boninal
                [133, 8, 21, 116, 133],  //Palmeiras

                //Itabuna
                [134, 13, null, null, 134],
                [135, 13, null, null, 135],
                [136, 13, 23, null, 136],
                [137, 13, 24, null, 137],
                [138, 13, 25, null, 138],
                [139, 13, 26, null, 139],
                [140, 13, 27, null, 140],
                [141, 13, 28, null, 141],

                //Coordenadoria Itabuna
                //Gerencia Itabuna
                [142, 13, 22, 120, 142], //Itapé
                [143, 13, 22, 121, 143], //Ibicaraí
                [144, 13, 22, 122, 144], //Floresta Azul

                //Coordenadoria Itabuna
                //Gerencia Valença
                [145, 13, 23, 124, 145], //Taperoá
                [146, 13, 23, 125, 146], //Nilo Peçanha
                [147, 13, 23, 126, 147], //Ituberá
                [148, 13, 23, 128, 148], //Camamu

                //Coordenadoria Itabuna
                //Gerencia Gandu
                [149, 13, 24, 129, 149], //Trancredo Neves
                [150, 13, 24, 130, 150], //Teolândia
                [151, 13, 24, 131, 151], //Wenceslau Guimarães
                [152, 13, 24, 132, 152], //Itamarí
                [153, 13, 24, 133, 153], //Piraí do Norte
                [154, 13, 24, 134, 154], //Nova Ibiá

                //Coordenadoria Itabuna
                //Gerencia Ubaitaba
                [155, 13, 25, 137, 155], //Ubatã
                [156, 13, 25, 138, 156], //Barra do Rocha

                //Coordenadoria Itabuna
                //Gerencia Aurelino Leal
                [157, 13, 26, 139, 157], //Coarací
                [158, 13, 26, 140, 158], //Almadina
                [159, 13, 26, 141, 159], //Gongogí

                //Coordenadoria Itabuna
                //Gerencia Ilhéus
                [160, 13, 27, 147, 160], //Canavieiras

                //Coordenadoria Itabuna
                //Gerencia Camacã
                [161, 13, 28, 148, 161], //Itaju do Colônia
                [162, 13, 28, 150, 162], //Jussarí
                [163, 13, 28, 152, 163], //Santa Luzia

                //Itapetinga
                [164, 14, null, null, 164],
                [165, 14, null, null, 165],
                [166, 14, null, null, 166],
                [167, 14, 30, null, 167],
                [168, 14, 31, null, 168],

                //Coordenadoria Itapetinga
                //Gerencia Itapetinga
                [169, 14, 29, 154, 169], // Caatiba
                [170, 14, 29, 155, 170], // Itambé
                [171, 14, 29, 156, 171], // Ribeirão do Largo
                [172, 14, 29, 157, 172], // Itororó

                //Coordenadoria Itapetinga
                //Gerencia Itarantim
                [173, 14, 30, 158, 173], //Potiraguá
                [174, 14, 30, 159, 174], //Maiquinique
                [175, 14, 30, 160, 175], //Macaraní

                //Coordenadoria Itapetinga
                //Gerencia Ibicuí
                [176, 14, 31, 161, 176], //Firmino Alves
                [177, 14, 31, 162, 177], //Iguaí
                [178, 14, 31, 163, 178], //Santa Cruz da Vitória
                [179, 14, 31, 164, 179], //Nova Canaã

                //Irece
                [180, 9, null, null, 180],
                [181, 9, null, null, 181],
                [182, 9, 33, null, 182],
                [183, 9, 34, null, 183],

                //Coordenadoria Irecê
                //Gerencia Irecê
                [184, 9, 32, 166, 184], //Presidente Dutra
                [185, 9, 32, 170, 185], //Uibaí

                //Jequie
                [186, 1, null, null, 186],
                [187, 1, null, null, 187],
                [188, 1, null, null, 188],
                [189, 1, 36, null, 189],
                [190, 1, 37, null, 190],
                [191, 1, 38, null, 191],
                [192, 1, 39, null, 192],

                //Juazeiro
                [193, 10, null, null, 193],
                [194, 10, null, null, 194],
                [195, 10, null, null, 195],
                [197, 10, 41, null, 197],
                [198, 10, 42, null, 198],
                [199, 10, 43, null, 199],

                //Miguel Calmon
                [200, 11, null, null, 200],
                [201, 11, null, null, 201],
                [202, 11, 46, null, 202],
                [203, 11, 47, null, 203],
                [204, 11, 48, null, 204],


                //Coordenadoria Miguel Calmon
                //Gerencia Miguel Calmon
                [205, 11, 45, 223, 205], //Capim Grosso
                [206, 11, 45, 224, 206], //Serrolândia
                [207, 11, 45, 225, 207], //Quixabeira
                [208, 11, 45, 226, 208], //Várzea do Poço

                //Coordenadoria Miguel Calmon
                //Gerencia Mundo Novo
                [209, 11, 46, 227, 209], //Piritiba
                [210, 11, 46, 228, 210], //Tapiramutá
                [211, 11, 46, 229, 211], //Mairi
                [212, 11, 46, 230, 212], //Várzea da Roça

                //Coordenadoria Miguel Calmon
                //Gerencia Jacobina
                [213, 11, 47, 231, 213], //Caldeirão Grande
                [214, 11, 47, 232, 214], //Caem
                [215, 11, 47, 233, 215], //Saúde
                [216, 11, 47, 234, 216], //Mirangaba

                //Coordenadoria Paulo Afonso
                //Paulo Afonso
                [217, 7, null, null, 217],
                [218, 7, null, null, 218],
                [219, 7, 50, null, 219],
                [220, 7, 51, null, 220],

                //Coordenadoria Paulo Afonso
                //Gerencia Paulo Afonso
                [221, 7, 49, 240, 221], //Santa Brígida
                [222, 7, 49, 241, 222], //Glória
                [223, 7, 49, 242, 223], //Rodelas

                //Coordenadoria Paulo Afonso
                //Gerencia Jeremoabo
                [224, 7, 50, 243, 224], //Pedro Alexandre
                [225, 7, 50, 245, 225], //Sítio do Quinto

                //Coordenadoria Paulo Afonso
                //Gerencia Abaré
                [226, 7, 51, 246, 226], //Chorrochó
                [227, 7, 51, 247, 227], //Mucururé

                //Ribeira do Pombal
                [228, 3, null, null, 228],
                [229, 3, null, null, 229],
                [230, 3, 53, null, 230],
                [231, 3, 54, null, 231],
                [232, 3, 55, null, 232],
                [233, 3, 56, null, 233],
                [234, 3, 57, null, 234],
                [235, 3, 58, null, 235],

                //Santa Maria da Vitoria
                [236, 6, null, null, 236],
                [237, 6, null, null, 237],
                [238, 6, 60, null, 238],
                [239, 6, 61, null, 239],
                [240, 6, 62, null, 240],

                //Coordenadoria Santa Maria da Vitória
                //Gerencia Santa Maria da Vitória
                [241, 6, 59, 289, 241], //Correntina
                [242, 6, 59, 290, 242], //São Félix do Coribe

                //Coordenadoria Santa Maria da Vitória
                //Gerencia Cocos
                [243, 6, 60, 292, 243], //Coribe
                [244, 6, 60, 293, 244], //Feira da Mata


                //Coordenadoria Santa Maria da Vitória
                //Gerencia Bom Jesus da Lapa
                [245, 6, 61, 294, 245], //Riacho de Santana
                [246, 6, 61, 295, 246], //Serra do Ramalho
                [247, 6, 61, 296, 247], //Sítio do Mato
                [248, 6, 61, 297, 248], //Carinhanha


                //Coordenadoria Santa Maria da Vitória
                //Gerencia Santana
                [249, 6, 62, 298, 249], //Serra Dourada
                [250, 6, 62, 299, 250], //Brejolândia
                [251, 6, 62, 300, 251], //Tabocas do Brejo Velho

                //Teixeira de Freitas
                [252, 15, null, null, 252],
                [253, 15, null, null, 253],
                [254, 15, 64, null, 254],
                [255, 15, 65, null, 255],
                [256, 15, 66, null, 256],

                //Vitoria da Conquista
                [257, 2, null, null, 257],
                [258, 2, null, null, 258],
                [259, 2, 68, null, 259],
                [260, 2, 69, null, 260],
                [261, 2, 70, null, 261]
            ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->delete('portal.coordenadoria_gerencia',[ 'cog_id' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121, 122, 123, 124, 125, 126, 127, 128, 129, 130, 131, 132, 133, 134, 135, 136, 137, 138, 139, 140, 141, 142, 143, 144, 145, 146, 147, 148, 149, 150, 151, 152, 153, 154, 155, 156, 157, 158, 159, 160, 161, 162, 163, 164, 165, 166, 167, 168, 169, 170, 171, 172, 173, 174, 175, 176, 177, 178, 179, 180, 181, 182, 183, 184, 185, 186, 187, 188, 189, 190, 191, 192, 193, 194, 195, 196, 197, 198, 199, 200, 201, 202, 203, 204, 205, 206, 207, 208, 209, 210, 211, 212, 213, 214, 215, 216, 217, 218, 219, 220, 221, 222, 223, 224, 225, 226, 227, 228, 229, 230, 231, 232, 233, 234, 235, 236, 237, 238, 239, 240, 241, 242, 243, 244, 245, 246, 247, 248, 249, 250, 251, 252, 253, 254, 255, 256, 257, 258, 259, 260, 261]]);

        $this->delete('portal.contato',[ 'con_id' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121, 122, 123, 124, 125, 126, 127, 128, 129, 130, 131, 132, 133, 134, 135, 136, 137, 138, 139, 140, 141, 142, 143, 144, 145, 146, 147, 148, 149, 150, 151, 152, 153, 154, 155, 156, 157, 158, 159, 160, 161, 162, 163, 164, 165, 166, 167, 168, 169, 170, 171, 172, 173, 174, 175, 176, 177, 178, 179, 180, 181, 182, 183, 184, 185, 186, 187, 188, 189, 190, 191, 192, 193, 194, 195, 196, 197, 198, 199, 200, 201, 202, 203, 204, 205, 206, 207, 208, 209, 210, 211, 212, 213, 214, 215, 216, 217, 218, 219, 220, 221, 222, 223, 224, 225, 226, 227, 228, 229, 230, 231, 232, 233, 234, 235, 236, 237, 238, 239, 240, 241, 242, 243, 244, 245, 246, 247, 248, 249, 250, 251, 252, 253, 254, 255, 256, 257, 258, 259, 260, 261]]);

        $this->delete('portal.contato_tipo',[ 'cti_id' => [1, 2, 3]]);

        $this->delete('portal.escritorio',[ 'esc_id' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121, 122, 123, 124, 125, 126, 127, 128, 129, 130, 131, 132, 133, 134, 135, 136, 137, 138, 139, 140, 141, 142, 143, 144, 145, 146, 147, 148, 149, 150, 151, 152, 153, 154, 155, 156, 157, 158, 159, 160, 161, 162, 163, 164, 165, 166, 167, 168, 169, 170, 171, 172, 173, 174, 175, 176, 177, 178, 179, 180, 181, 182, 183, 184, 185, 186, 187, 188, 189, 190, 191, 192, 193, 194, 195, 196, 197, 198, 199, 200, 201, 202, 203, 204, 205, 206, 207, 208, 209, 210, 211, 212, 213, 214, 215, 216, 217, 218, 219, 220, 221, 222, 223, 224, 225, 226, 227, 228, 229, 230, 231, 232, 233, 234, 235, 236, 237, 238, 239, 240, 241, 242, 243, 244, 245, 246, 247, 248, 249, 250, 251, 252, 253, 254, 255, 256, 257, 258, 259, 260, 261, 262, 263, 264, 265, 266, 267, 268, 269, 270, 271, 272, 273, 274, 275, 276, 277, 278, 279, 280, 281, 282, 283, 284, 285, 286, 287, 288, 289, 290, 291, 292, 293, 294, 295, 296, 297, 298, 299, 300, 301, 302, 303, 304, 305, 306, 307, 308, 309, 310, 311, 312, 313, 314, 315, 316, 317, 318, 319, 320, 321, 322, 323, 324, 325, 326, 327, 328, 329, 330, 331, 332, 333, 334, 335, 336]]);

        $this->delete('portal.gerencia',[ 'ger_id' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70]]);
    }
}
