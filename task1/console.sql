select
    subquery.name,
    sum(if(p1.id is not null, 1, 0)) as numberCount
from (
    select u1.id,
           u1.name
 from user1s u1
 where u1.gender = 2
   and year(now()) - year(u1.birth_date) between 18 and 22
   ) as subquery
 left join phone1s as p1 on p1.user_id = subquery.id
group by subquery.id;
