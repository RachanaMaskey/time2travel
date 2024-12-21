function generateResponse() {
  const place = document.getElementById("place").value;
  const budget = document.getElementById("budget").value;
  const time = document.getElementById("time").value;

  const data = {
      place: place,
      budget: budget,
      time: time,
  };

  fetch("response.php", {
      method: "POST",
      headers: {
          "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
  })
      .then((response) => {
          if (!response.ok) {
              throw new Error(`HTTP error! status: ${response.status}`);
          }
          return response.json();
      })
      .then((data) => {
          // Get the response data
          const responseData = data.response;
          
          // Create the HTML table
          let tableHTML = `
  <style>
  .travel-table-container {
    max-width: 1200px;
    margin: 30px auto;
    font-family: 'Segoe UI', Arial, sans-serif;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
    border-radius: 12px;
    overflow: hidden;
}

.travel-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    background: #fff;
}

.travel-table th {
    background: linear-gradient(45deg, #2196F3, #1976D2);
    color: white;
    padding: 18px 25px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-size: 14px;
    transition: all 0.3s ease;
}

.travel-table td {
    padding: 18px 25px;
    border-bottom: 1px solid #eee;
    font-size: 15px;
    transition: all 0.3s ease;
}

.travel-table tr:last-child td {
    border-bottom: none;
}

.travel-table tr:hover td {
    background-color: #f8f9ff;
    transform: scale(1.01);
}

.place-cell {
    display: flex;
    align-items: center;
    gap: 10px;
}

.place-icon {
    color: #2196F3;
    font-size: 20px;
}

.budget-badge {
    background: #e3f2fd;
    color: #1976D2;
    padding: 6px 12px;
    border-radius: 20px;
    font-weight: 500;
}

.time-cell {
    color: #666;
    display: flex;
    align-items: center;
    gap: 8px;
}

.content-list {
    padding: 0;
    margin: 0;
    list-style-position: inside;
}

.content-list li {
    margin: 8px 0;
    line-height: 1.6;
    color: #444;
}

@media (max-width: 768px) {
    .travel-table {
        display: block;
        overflow-x: auto;
    }
    
    .travel-table th,
    .travel-table td {
        padding: 12px 15px;
        font-size: 14px;
    }
}
  </style>
  <div class="travel-table-container">
    <table class="travel-table">
        <tr>
            <th>Place</th>
            <th>Budget</th>
            <th>Time</th>
            <th>Generated Content</th>
        </tr>
        <tr>
            <td>
                <div class="place-cell">
                    <i class="place-icon fas fa-map-marker-alt"></i>
                    ${responseData.Place}
                </div>
            </td>
            <td>
                <span class="budget-badge">
                    ${responseData.Budget}
                </span>
            </td>
            <td>
                <div class="time-cell">
                    <i class="far fa-clock"></i>
                    ${responseData.Time}
                </div>
            </td>
            <td>
                <ol class="content-list">
                    <li>${responseData['Generated Content']}</li>
                </ol>
            </td>
        </tr>
    </table>
</div>
`;


          
          // Insert the table into the response div
          document.getElementById("response").innerHTML = tableHTML;
      })
      .catch((error) => {
          console.error("Fetch error:", error);
          document.getElementById("response").innerHTML =
              "An error occurred while processing your request.";
      });
}
