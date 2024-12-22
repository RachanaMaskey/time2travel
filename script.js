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
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
        overflow: hidden;
    }

    .travel-table {
        width: 100%;
        border-collapse: collapse; /* Ensures borders are shared between cells */
        background: #f2e0c9; /* Set table background color */
        border: 2px solid #8c3838; /* Add border around the table */
    }

    .travel-table th,
    .travel-table td {
        padding: 18px 25px;
        border: 1px solid #8c3838; /* Add border to table headers and cells */
        font-size: 15px;
        transition: all 0.3s ease;
    }

    .travel-table th {
        background: #8c3838;
        color: white;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-size: 14px;
    }

    .travel-table td {
        color: #333;
    }

    .travel-table tr:hover td {
        background-color:  #f2e0c9;
        transform: scale(1.01);
    }

    .place-cell {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .place-icon {
        color: #8c3838;
        font-size: 20px;
    }

    .budget-badge {
        background: #f2e0c9;
        color: #8c3838;
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
            <th>Reccomendations</th>
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
