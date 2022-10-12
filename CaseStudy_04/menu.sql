create table Orders
( orderid int unsigned not null auto_increment primary key,
  JJQty char(50) not null,
  JJType char(50) null,
  ALQty char(50) not null,
  ALType char(50) not null,
  CQty char(50) not null,
  CType char(50) not null,
  Cost char(50) not null
);