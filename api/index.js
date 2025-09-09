const apiBase = "http://localhost/library-db-management/api";

function loadAuthors() {
  fetch(`${apiBase}/authors`)
    .then(res => res.json())
    .then(data => {
      const list = document.getElementById("author-list");
      list.innerHTML = "";

      data.forEach(author => {
        const li = document.createElement("li");
        li.textContent = `${author.author_id}: ${author.name} (${author.nationality}, born ${author.dob}) `;

  
        const updateBtn = document.createElement("button");
        updateBtn.textContent = "Update";
        updateBtn.onclick = () => updateAuthor(author.author_id);

        const deleteBtn = document.createElement("button");
        deleteBtn.textContent = "Delete";
        deleteBtn.onclick = () => deleteAuthor(author.author_id);

        li.appendChild(updateBtn);
        li.appendChild(deleteBtn);
        list.appendChild(li);
      });
    })
    .catch(err => console.error("Error loading authors:", err));
}

function addAuthor() {
  const name = prompt("Author name:");
  const dob = prompt("Date of birth (YYYY-MM-DD):");
  const nationality = prompt("Nationality:");

  if (!name || !dob || !nationality) return alert("All fields are required");

  const newAuthor = { name, dob, nationality };

  fetch(`${apiBase}/author`, {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(newAuthor)
  })
    .then(res => res.text())
    .then(msg => {
      alert(msg);
      loadAuthors();
    })
    .catch(err => console.error("Error adding author:", err));
}

function updateAuthor(id) {
  const name = prompt("New name:");
  const dob = prompt("New date of birth (YYYY-MM-DD):");
  const nationality = prompt("New nationality:");

  if (!name || !dob || !nationality) return alert("All fields are required");

  const updatedAuthor = { name, dob, nationality };

  fetch(`${apiBase}/author/${id}`, {
    method: "PATCH",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(updatedAuthor)
  })
    .then(res => res.text())
    .then(msg => {
      alert(msg);
      loadAuthors();
    })
    .catch(err => console.error("Error updating author:", err));
}

function deleteAuthor(id) {
  if (!confirm("Are you sure you want to delete this author?")) return;

  fetch(`${apiBase}/author/${id}`, { method: "DELETE" })
    .then(res => res.text())
    .then(msg => {
      alert(msg);
      loadAuthors();
    })
    .catch(err => console.error("Error deleting author:", err));
}

document.getElementById("load-authors").addEventListener("click", loadAuthors);
document.getElementById("add-author").addEventListener("click", addAuthor);
