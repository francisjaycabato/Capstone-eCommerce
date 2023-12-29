SELECT u.*, s.*
FROM ecommerce.user u
JOIN ecommerce.stores s ON u.USERNAME = s.USERNAME;