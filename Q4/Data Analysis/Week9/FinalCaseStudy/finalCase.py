import numpy as np
import matplotlib.pyplot as plt
import pandas as pd

# Load the Apple data from a CSV file into a DataFrame
appledata = pd.read_csv('Q4\Data Analysis\Week9\FinalCaseStudy\AppleDataRestructured.csv')
df_appleData = pd.DataFrame(appledata)

def apple(model="all"):
    """
    Generates the iPhone model name based on the input.
    
    Args:
        model (str): The model number as a string. Default is "all".
    
    Returns:
        str: The full name of the iPhone model.
    """
    base = "iPhone " + model
    if model == "1":
        base = base[0:-1]  # Remove the trailing number if model is "1"
    return base

# Extract contract and launch prices, removing NaN values
contract_prices = df_appleData["contract_launch_price"].dropna()
launch_prices = df_appleData["launch_price"].dropna()

def convertToValues(data):
    """
    Converts a price string to a list of integers, handling different formats.
    
    Args:
        data (str): The price data as a string.
    
    Returns:
        list: A list containing the extracted price values or NaNs.
    """
    values = []
    if data != "nan":
        if data.find("/") != -1:  # Check if the data contains a '/'
            if data.find("*") != -1:
                data[:-1]  # Remove any trailing character
            temp = data.split("/")
<<<<<<< Updated upstream
            value1 = int(temp[0][1:])
            value2 = int(temp[1][1:])
            try:
                value3 = int(temp[2][1:])
=======
            value1 = int(temp[0][1:].replace("*", ""))
            value2 = int(temp[1][1:].replace("*", ""))
            try:
                value3 = int(temp[2][1:].replace("*", ""))
>>>>>>> Stashed changes
                return [value1, value2, value3]
            except:
                return [value1, value2, np.nan]
        else:
            value1 = int(data[1:])  # Convert single value to int
            return [value1, np.nan, np.nan]
    else:
        return [np.nan, np.nan, np.nan]  # Return NaNs if data is "nan"

# Process launch prices and contract prices into a list
launch_prices = []
for i in range(0, df_appleData["launch_price"].count()):
    integers = convertToValues(str(df_appleData["launch_price"][i]))
    if integers != False:
        launch_prices.append(integers)

<<<<<<< Updated upstream
def scatterGraph(rows, columns):
    fig, ax = plt.subplots()
    for column in columns:
        ax.scatter(rows, column, alpha=0.3, edgecolors='w',)
    z = np.polyfit(rows, columns, 1)
    p = np.poly1d(z)
=======
def predict_future_prices(val, future_years):
    """
    Predicts future prices based on historical price data using linear growth.
    
    Args:
        val (DataFrame): DataFrame containing price data.
        future_years (list): List of future years to predict prices for.
    
    Returns:
        dict: A dictionary mapping future years to predicted prices.
    """
    # Extract years and prices
    years = val["year"].values
    base_prices = val["base_price"].values
    max_prices = val["max_price"].values
>>>>>>> Stashed changes

    # Remove NaN values
    valid_base_mask = np.isfinite(base_prices)
    valid_max_mask = np.isfinite(max_prices)

    # Calculate the lowest base price and the highest max price
    min_base_price = base_prices[valid_base_mask].min()
    max_price = max_prices[valid_max_mask].max()

    # Calculate the average change per year
    years_range = val["year"].max() - val["year"].min()
    if years_range > 0:
        average_change = (max_price - min_base_price) / years_range
    else:
        average_change = 0

    # Use the last known max price as the starting point for prediction
    last_known_price = max_price

    # Predict prices for all future years
    predicted_prices = {}
    for future_year in future_years:
        n = future_year - val["year"].max()
        predicted_price = last_known_price + (average_change * n)
        predicted_prices[future_year] = predicted_price

    return predicted_prices

def lineGraph(val, future_years):
    """
    Creates a line graph for the historical and predicted prices.
    
    Args:
        val (DataFrame): DataFrame containing price data.
        future_years (list): List of future years to predict prices for.
    """
    columns = [val["base_price"], val["upgraded_price"], val["max_price"]]
    columnLabels = ["Base Price", "Upgraded Price", "Max Price"]
    
    # Create a single figure and axis with a specified size
    fig, ax = plt.subplots(figsize=(10, 6))

    for i in range(3):
        y = columns[i]
        x = val["year"]
        mask = np.isfinite(y)

        ax.plot(x[mask], y[mask], ls="--", lw=1, label=columnLabels[i], 
                color=plt.cm.tab10(i), alpha=0.7, marker='o', markersize=5)
        
        ax.plot(x, y, color=plt.cm.tab10(i), lw=1.5, alpha=0.7, marker='o', markersize=5)

    # Predict prices for the specified future years
    predicted_prices = predict_future_prices(val, future_years)

    # Plot predicted prices
    future_years_sorted = sorted(predicted_prices.keys())
    future_prices = [predicted_prices[year] for year in future_years_sorted]
    
    ax.plot(future_years_sorted, future_prices, color='black', marker='X', label='Predicted Prices', lw=2)

    # Add labels for predicted prices
    for future_year, future_price in predicted_prices.items():
        ax.text(future_year, future_price - 100, f"${future_price:.2f}", 
                fontsize=9, ha='center', va='bottom', color='black')

    # Combine historical years and prices for linear regression
    historical_years = val["year"].values
    historical_prices = val["max_price"].dropna().values

    # Create a valid mask for historical prices
    valid_mask = np.isfinite(val["max_price"].values)
    historical_years = historical_years[valid_mask]
    historical_prices = val["max_price"].values[valid_mask]

    # Filter to only include years >= 2008
    valid_year_mask = historical_years >= 2008
    historical_years = historical_years[valid_year_mask]
    historical_prices = historical_prices[valid_year_mask]

    # Combine with future years and their corresponding predicted prices
    all_years = np.concatenate([historical_years, future_years_sorted])
    all_prices = np.concatenate([historical_prices, future_prices])

    # Perform linear regression to find the best-fit line
    coefficients = np.polyfit(all_years, all_prices, 1)
    best_fit_line = np.poly1d(coefficients)

    # Generate x values for the best-fit line
    x_fit = np.linspace(all_years.min(), all_years.max(), 100)
    y_fit = best_fit_line(x_fit)

    # Plot the best-fit line
    ax.plot(x_fit, y_fit, color='orange', ls="--", label='Best Fit Line', lw=2, alpha=0.4)

    # Set x-axis and y-axis labels
    ax.set_xlabel('Year')
    ax.set_ylabel('Price ($ USD)')
    ax.set_title('iPhone Prices Over Time')

    # Set y-ticks to show more increments
    yticks = np.arange(0, max(val['max_price'].max(), 2000), 100)
    ax.set_yticks(yticks)

    # Set the minimum y-limit
    ax.set_ylim(bottom=399)

    # Set x-ticks to go up by one year
    start_year = val["year"].min()
    end_year = max(future_years)
    ax.set_xticks(range(start_year, end_year + 1))

    ax.legend()
    
    # Adjust layout to fit everything nicely
    fig.tight_layout()
    
    # Show the plot
    plt.show()

#-------------FORMAT DATA TO DATA FRAME OR SERIES----------------

<<<<<<< Updated upstream
#Set up the rows with all of the dates (preferrably only the year)
rows = []

#Set up all of the columns with the values (You'll need three columns, one for each price)
columns = []
=======
# Set up the rows with all of the dates (preferably only the year)
rows = []  # years
for index in range(len(df_appleData)):
    row_df = df_appleData.iloc[index]
    
    release_date_str = row_df["release_date"]

    # Extract the year from the release date string
    if "/" not in release_date_str:
        row_year = int(release_date_str[-4:])  # Extract last 4 characters as year
    else:
        first_release = release_date_str.split("/")[0]
        first_release = first_release.split(" (")[0]
        row_year = int(first_release[-4:])  # Extract the year from the first release
    
    rows.append(row_year)

# Set up all of the columns with the values (You'll need three columns, one for each price)
base_prices = []
upgraded_prices = []
max_prices = []
for i in range(len(launch_prices)):
    if len(launch_prices[i]) == 1:
        base_prices.append(launch_prices[i][0])
        upgraded_prices.append(0)
        max_prices.append(0)
    elif len(launch_prices[i]) == 2:
        base_prices.append(launch_prices[i][0])
        upgraded_prices.append(launch_prices[i][1])
        max_prices.append(0)
    else:
        base_prices.append(launch_prices[i][0])
        upgraded_prices.append(launch_prices[i][1])
        max_prices.append(launch_prices[i][2])

# Create a DataFrame for graphing
df_graphData = pd.DataFrame({
    'year': rows, 
    'base_price': base_prices, 
    'upgraded_price': upgraded_prices,
    'max_price': max_prices
})
>>>>>>> Stashed changes

# Set up the future years for predictions
future_year = [2021, 2022, 2023, 2024, 2025, 2026, 2027, 2028]

<<<<<<< Updated upstream
#Set up our prediction
pred_date = '2027' #Whatever date we want to predict goes here

pred_price = 0 #FV = PV*(1+r)^n FV = Future value, PV = past value, r = rate of change (we need to calculate), n = periods (future date - current date)
rows.append(pred_date)
columns.append(pred_price)

#End Result:
scatterGraph(rows, columns)
#----------------------------------------------------------------





=======
# Generate the line graph with historical and predicted prices
lineGraph(df_graphData, future_year)
#----------------------------------------------------------------
>>>>>>> Stashed changes
