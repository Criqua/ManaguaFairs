# ManaguaFairs

This Laravel-based web application was developed as part of a collaborative academic practice for the *Web Design & E-Commerce course*,  focused on applying the MVC architecture and relational database principles. The goal was to build a dynamic platform to manage and view *community entrepreneurship fairs* held in the neighborhoods of *Managua, Nicaragua*.

The application allows users to:
- Register new fairs with event details
- Add entrepreneurs and their business categories
- Link entrepreneurs to the fairs they participate in —and viceversa, via a many-to-many relationship

---

## Team & Responsibilities / Roles

Development was organized into feature branches per team member:

- **[Cristian Gago](https://github.com/Criqua)** – `feature/views`  
  Designed all responsive Blade views and integrated them with the application logic. Led the integration of feature branches into `develop` for testing. Served as *Frontend Developer*, and additionally took on the roles of *Tester & Documenter* in order to ensure the application’s functionality and documentation quality.

- **[Manuel López](https://github.com/ElVatoEste)** – `feature/controllers`  
  Implemented all controllers, route definitions, and form validation logic. Took the role as a *Backend Developer* by defining the application's logic flow.

- **[María Aguilar](https://github.com/mabelenaa)** – `feature/models`  
  Defined Eloquent models, their relationships, and built database migrations. By designing the data structure, fulfilled the role of *Requirements Analyst* to ensure that the relationed model was indeed scalable and consistent.

---

## Git Workflow

As previously stated:
- Each member developed on a dedicated **feature branch** (`feature/models`, `feature/controllers`, `feature/views`)
- All feature branches were merged into develop for integration and testing
- Once stable, the `develop` branch was merged into `main` as the stable release branch
