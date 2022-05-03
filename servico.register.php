<?php 
    require_once('config/config.php');
    session_start();

    $service = new ServicoService();

    $imagem = filter_input(INPUT_POST, 'inputImagem', FILTER_SANITIZE_SPECIAL_CHARS);
    $titulo = filter_input(INPUT_POST, 'inputTitulo', FILTER_SANITIZE_SPECIAL_CHARS);
    $descricao = filter_input(INPUT_POST, 'inputDescricao', FILTER_SANITIZE_SPECIAL_CHARS);
    $categoriaId = filter_input(INPUT_POST, 'inputCategoria', FILTER_SANITIZE_NUMBER_INT);
 
    $servico = new Servico();
    $servico->setImagem($imagem);
    $servico->setTitulo($titulo);
    $servico->setDescricao($descricao);
    $servico->setCategoriaId($categoriaId);

    if($service->cadastrar($servico))
    {
        header('location: ./home');
        exit;
    } else {
        $_SESSION['error'] = 'Ocorreu uma falha ao cadastrar';
        header('location: ./servicos');
        exit;
    }