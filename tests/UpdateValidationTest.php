<?php

use PHPUnit\Framework\TestCase;

class UpdateValidationTest extends TestCase
{
    private $capturedHeaders = [];

    protected function setUp(): void
    {
        parent::setUp();

        // Override the header function to capture headers
        $this->capturedHeaders = [];
        function header($header, $replace = true)
        {
            if (!$replace && in_array($header, $this->capturedHeaders)) {
                return;
            }
            $this->capturedHeaders[] = $header;
        }
    }

    public function testValidUpdate()
    {
        // Mock the database connection
        $dbMock = $this->createMock(mysqli::class);
        $dbMock->method('stmt_init')->willReturn($this->createMock(mysqli_stmt::class));

        // Create a request object with valid data
        $_SERVER["REQUEST_METHOD"] = "POST";
        $_POST = [
            "user_id" => 1,
            "username" => "new_username",
            "first_name" => "John",
            "last_name" => "Doe",
            "country" => "USA",
            "email" => "john.doe@example.com",
        ];

        // Include the file to test
        include "../pages/UpdateValidation.php";

        // Assertions: Check if redirection header is set
        $this->assertNotEmpty($this->capturedHeaders);
        $this->assertStringContainsString('Location: HomePage.php?update_success=1', end($this->capturedHeaders));
    }

    // Add more test cases for different scenarios (e.g., invalid data, edge cases, etc.)
}
