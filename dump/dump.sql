CREATE DATABASE IF NOT EXISTS vehicle;

USE vehicle;

CREATE TABLE IF NOT EXISTS brand
(
    id         INT AUTO_INCREMENT
        PRIMARY KEY,
    name       VARCHAR(255)                       NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP NULL,
    updated_at DATETIME                           NULL,
    CONSTRAINT brand_name_uindex
        UNIQUE (name)
);

CREATE TABLE IF NOT EXISTS model
(
    id         INT AUTO_INCREMENT
        PRIMARY KEY,
    name       VARCHAR(255)                       NOT NULL,
    brand_id   INT                                NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP NULL,
    updated_at DATETIME                           NULL,
    CONSTRAINT model_name_uindex
        UNIQUE (name),
    CONSTRAINT model_brand_id_fk
        FOREIGN KEY (brand_id) REFERENCES brand (id)
);

CREATE TABLE IF NOT EXISTS vehicle
(
    id         INT AUTO_INCREMENT
        PRIMARY KEY,
    value      DOUBLE(10, 2) NOT NULL,
    brand_id   INT           NOT NULL,
    model_id   INT           NOT NULL,
    year_model INT           NOT NULL,
    fuel       VARCHAR(255)  NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP NULL,
    updated_at DATETIME                           NULL,
    CONSTRAINT vehicles_brand_id_fk
        FOREIGN KEY (brand_id) REFERENCES brand (id),
    CONSTRAINT vehicles_model_id_fk
        FOREIGN KEY (model_id) REFERENCES model (id)
);

