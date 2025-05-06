# Book Catalog

Laravel CRUD app for book catalogs. Admins can create, view, update, and delete books and categories. Anonymous users can only see the book catalogs and book details.

## Endpoint
| Method | Routes | Description |
|--------|--------|-------------|
| GET | /books | List of books. |
| GET | /books/{id} | View book details. |
| GET | /profile | View user profile. |
| PATCH | /profile | Update user profile. |
| DELETE | /profile | Delete user account. |

### Protected endpoint (only admin can access):
| Method | Routes | Description |
|--------|--------|-------------|
| GET | /books/create | Show book creation form. |
| POST | /books | Add book to the database. |
| GET | /book/{id}/edit | Get edit book form. |
| PUT | /book/{id} | Update the book to the database. |
| DELETE | /book/{id} | Delete the book from database. |
| RESOURCE | categories | Resource routes for categories management. |

And auth route provided by Breeze.

## Features
- Pagination
- Filter by category
- Search by book title and author
- MySQL database

## Quickstart

1. Make sure you have PHP and Laravel installed.
2. Clone the repository.
3. `cd` into project directory.
4. Run `composer run dev`.
5. Go to http://localhost:8000.