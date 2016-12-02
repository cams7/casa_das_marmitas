--Pedidos por cliente
select 
	c.nome as nome_cliente, count(p.id) as qtd_pedidos, sum(p.quantidade_total) as qtd_marmitas, sum(p.total_pedido) as custo_total 	
from clientes c inner join pedidos p on c.id = p.cliente_id
group by c.id /*having count(p.id) = 3*/ order by nome_cliente;

--Pedidos
select 
	c.nome as nome_cliente, count(p.id) as qtd_itens,
	CASE 
		WHEN p.quantidade_total=sum(i.quantidade) 
		THEN p.quantidade_total ELSE 0 
	END as qtd_marmitas, 
	CASE 
		WHEN p.total_pedido=(sum(i.quantidade * m.custo) + t.taxa) 
		THEN p.total_pedido ELSE 0 
	END as custo_total
from clientes c inner join pedidos p on c.id = p.cliente_id inner join taxas t on t.id = p.taxa_id inner join pedido_itens i on p.id = i.pedido_id inner join produtos m on m.id = i.produto_id 
group by c.id, t.id, p.id order by nome_cliente, qtd_itens desc, qtd_marmitas desc, custo_total desc;
