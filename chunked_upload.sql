CREATE TABLE chunked_uploads
(
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    user_id VARCHAR(256),
    token_id VARCHAR(40),
    entry_id VARCHAR(20),
    partner_id INTEGER NOT NULL,
    upload_total_time INTEGER,
    concurrent_chunks INTEGER NOT NULL,
    total_chunks INTEGER,
    chunk_size REAL NOT NULL,
    file_size REAL NOT NULL,
    filename VARCHAR(1000) NOT NULL,
    x_forwarded_for VARCHAR(45),
    remote_addr VARCHAR(45) NOT NULL,
    last_status TEXT,
    insert_date INTEGER NOT NULL
);
