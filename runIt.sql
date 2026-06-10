USE books_api;

INSERT INTO users (name, email, password_hash, role) VALUES
 ('Demo Admin', 'admin@books.test', '$2y$10$H1F0X.b2ykNBkCRK50lXseEPjjZB0I29kRAMvKZjKMwEsGCz89bci', 'admin'),
 ('Demo Member', 'member@books.test', '$2y$10$H1F0X.b2ykNBkCRK50lXseEPjjZB0I29kRAMvKZjKMwEsGCz89bci', 'member');