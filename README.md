# PROVA

## Produto

### GET `/produtos`
Retorna todos os produtos cadastrados.

### GET `/produtos/{id}`
Retorna todas as informações de um produto cadastrado.

### POST `/produtos`
Envia informações para cadastrar um novo produto.
```json
{
    "nome": "Mouse",
    "descricao": "Mouse sem fio",
    "preco": "50.50",
    "estoque": 15
}
```

### PATCH `/produtos/{id}`
Atualiza as informações de um produto já cadastrado.
```json
{
    "descricao": "Mouse com fio",
    "estoque": 20
}
```

### DELETE `/produtos/{id}`
Remove um produto já cadastrado.

## Venda

### GET `/vendas`
Retorna todos as vendas cadastradas.

### GET `/vendas/{id}`
Retorna todas as informações de uma venda cadastrada.

### POST `/vendas`
Envia informações para cadastrar uma nova venda.
```json
{
    "comprador": "Luiz",
    "descricao": "Compra de natal",
}
```

### PATCH `/vendas/{id}`
Atualiza as informações de uma venda já cadastrada.
```json
{
    "descricao": "Compra de BlackFraude",
}
```

### DELETE `/vendas/{id}`
Remove uma venda já cadastrada.

## ProdutoVenda

### GET `/vendas/{id}/produtos`
Retorna todos os produtos associados a uma venda.

### GET `/vendas/{id}/produtos/{id}`
Retorna todas as informações de um produto associado a venda.

### POST `/vendas/{id}/produtos`
Envia as informações para associar novos produtos em uma venda.
```json
{
	"produtos": [
		{
            "id": 1,
            "quantidade": 3
        },
        {
            "id": 2,
            "quantidade": 5
		}
	]
}
```

### PATCH `/vendas/{id}/produtos/{id}`
Atualiza as da associação entre venda e produto.
```json
{
    "quantidade": 2,
}
```

### DELETE `/vendas/{id}/produtos/{id}`
Remove a associação de um produto com a venda.

### POST `/vendas/{id}/realizar`
Tenta realizar a venda, verificando o status e se os produtos possuem estoque disponível, retorna o valor total da venda caso seja bem sucedida.