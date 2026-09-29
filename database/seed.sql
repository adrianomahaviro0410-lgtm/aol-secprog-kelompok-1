USE `aol_secprog`;

-- Insert Initial Seed Users with secure Bcrypt hashed passwords
-- Password for all seed users conforms to strong password policy:
-- Admin:    admin@shopsecure.com    / Admin123!@#
-- Seller:   seller@shopsecure.com   / Seller123!@#
-- Customer: customer@shopsecure.com / Customer123!@#

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `phone`, `bio`, `status`) VALUES
(1, 'Administrator', 'admin@shopsecure.com', '$2y$12$XuUeGPcXaF9MQOpuOrbOveE5WXyZLeaYIozA5rVqfBBuVtUvC810C', 'admin', '+628111223344', 'System administrator and security auditor.', 'active'),
(2, 'Official Cyber Gear Store', 'seller@shopsecure.com', '$2y$12$RmbwCbe/T0WVhBkEISmou./PUUvfmfgcdWfzRcGDXSMqBablcGotC', 'seller', '+628129876543', 'Authorized reseller for cybersecurity and networking devices.', 'active'),
(3, 'John Customer', 'customer@shopsecure.com', '$2y$12$JIOjdhoNSQd0zL2iEOHSKe.pX6MOKLGxccPJwyFjhsn9ylMdBXH/e', 'customer', '+628135556677', 'Enthusiast ethical hacker and university student.', 'active')
ON DUPLICATE KEY UPDATE `email` = VALUES(`email`);

-- Insert Sample Categories
INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'Hardware Security Keys', 'FIDO2 / U2F Hardware authentication keys and dongles'),
(2, 'Network Defense Devices', 'Hardware firewalls, routers, and secure VPN appliances'),
(3, 'Cybersecurity Books', 'Textbooks, penetration testing guides, and reference materials')
ON DUPLICATE KEY UPDATE `name` = VALUES(`name`);

-- Insert Sample Products
INSERT INTO `products` (`id`, `seller_id`, `category_id`, `name`, `description`, `price`, `stock`) VALUES
(1, 2, 1, 'YubiKey 5 NFC Security Key', 'Dual-protocol hardware security key supporting FIDO2, WebAuthn, and OTP.', 850000.00, 25),
(2, 2, 1, 'Titan Security Key Bundle', 'USB-C and USB-A hardware security keys for multi-factor authentication.', 650000.00, 15),
(3, 2, 2, 'MikroTik hEX S Secure Router', 'Gigabit Ethernet router with SFP port and hardware encryption support.', 1200000.00, 8),
(4, 2, 3, 'Web Application Hacker''s Handbook', 'Comprehensive guide to finding and exploiting security flaws in web apps.', 450000.00, 12)
ON DUPLICATE KEY UPDATE `name` = VALUES(`name`);
