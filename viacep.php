<?php

    function pegarEndereco(){
        
        if(isset($_POST['cep'])){
            $cep = $_POST['cep'];
            $cep = filtroCep($cep);

            if(isCep($cep)){
        
                $endereco = pegaEnderecoViaCep($cep);
                if(property_exists($endereco, 'erro')){
                    $endereco = enderecoVazio();
                    $endereco->cep = 'CEP não encontrado';    
                }

            } else {
                $endereco = enderecoVazio();
                $endereco->cep = 'CEP inválido';
            }
        } else {
            $endereco = enderecoVazio();
        }
        return $endereco;
    }


    function pegaEnderecoViaCep(String $cep){
        
        $url = "https://viacep.com.br/ws/{$cep}/json/";
        return json_decode(file_get_contents($url));
    }

    function isCep(String $cep){
        return preg_match('/^[0-9]{5}-?[0-9]{3}$/', $cep);
    }

    function filtroCep(String $cep) {
        return preg_replace('/[^0-9]/', '', $cep);
    }

    function enderecoVazio(){
        return (object) [
            'cep' => '',
            'logradouro' => '',
            'bairro' => '',
            'localidade' => '',
            'uf' => ''
        ];
    }


 ?>