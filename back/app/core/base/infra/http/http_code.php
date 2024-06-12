<?php namespace App\core\base\infra\http;

class http_code {
   public const OPERCAO_SUCESSO=200;
   public const REGISTRO_CRIADO=201;
   public const REGISTRO_ATUALIZADO=200;
   public const ERRO_GENERICO_CLIENTE=400;
   public const NAO_AUTENTICADO=401;
   public const NAO_AUTORIZADO=403;
   public const RECUSO_NAO_ENCONTRADO=404;
   public const ARQUIVO_MAL_FORMATADO=422;
   public const DADOS_INVALIDOS_DO_CLIENTE=422;
   public const ERRO_GENERICO_NAO_TRATADO=500;
   public const RESPOSTA_INVALIDA_DO_SERVIDOR=502;
}
