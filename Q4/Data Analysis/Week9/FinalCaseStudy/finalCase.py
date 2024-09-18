import numpy as np
import matplotlib.pyplot as plt
import pandas as pd

# Load the Apple data from a CSV file into a DataFrame
appledata = pd.read_csv('Q4/Data Analysis/Week9/FinalCaseStudy/AppleDataRestructured.csv')
df_appleData = pd.DataFrame(appledata)

def apple(model="all"):
    base = "iPhone " + model
    if model == "1":
        base = base[0:-1]  # Remove the trailing number if model is "1"
    return base

# Extract contract and launch prices, removing NaN values
contract_prices = df_appleData["contract_launch_price"].dropna()
launch_prices = df_appleData["launch_price"].dropna()

def convertToValues(data):
    values = []
    if data != "nan":
        if data.find("/") != -1:
            if data.find("*") != -1:
                data[:-1]
            temp = data.split("/")
            value1 = int(temp[0][1:].replace("*", ""))
            value2 = int(temp[1][1:].replace("*", ""))
            try:
                value3 = int(temp[2][1:].replace("*", ""))
                return [value1, value2, value3]
            except:
                return [value1, value2, np.nan]
        else:
            value1 = int(data[1:])
            return [value1, np.nan, np.nan]
    else:
        return [np.nan, np.nan, np.nan]

# Process launch prices and contract prices into a list
launch_prices = []
for i in range(len(df_appleData)):
    integers_1 = convertToValues(str(df_appleData["launch_price"][i]))
    integers_2 = convertToValues(str(df_appleData["contract_launch_price"][i]))
    if integers_1:
        launch_prices.append(integers_1)
    elif integers_2:
        launch_prices.append(integers_2)

def predict_future_prices(val, future_years):
    years = val["year"].values
    base_prices = val["base_price"].values
    max_prices = val["max_price"].values

    valid_base_mask = np.isfinite(base_prices)
    valid_max_mask = np.isfinite(max_prices)

    min_base_price = base_prices[valid_base_mask].min()
    max_price = max_prices[valid_max_mask].max()

    years_range = val["year"].max() - val["year"].min()
    if years_range > 0:
        average_change = (max_price - min_base_price) / years_range
    else:
        average_change = 0

    last_known_price = max_price

    predicted_prices = {}
    for future_year in future_years:
        n = future_year - val["year"].max()
        predicted_price = last_known_price + (average_change * n)
        predicted_prices[future_year] = predicted_price

    return predicted_prices

def lineGraph(val, future_years):
    columns = [val["base_price"], val["upgraded_price"], val["max_price"]]
    columnLabels = ["Base Price", "Upgraded Price", "Max Price"]
    
    fig, ax = plt.subplots(figsize=(10, 6))

    for i in range(3):
        y = columns[i]
        x = val["year"]
        mask = np.isfinite(y)

        ax.plot(x[mask], y[mask], ls="--", lw=1, label=columnLabels[i], 
                color=plt.cm.tab10(i), alpha=0.7, marker='o', markersize=5)
        
        ax.plot(x, y, color=plt.cm.tab10(i), lw=1.5, alpha=0.7, marker='o', markersize=5)

    predicted_prices = predict_future_prices(val, future_years)
    future_years_sorted = sorted(predicted_prices.keys())
    future_prices = [predicted_prices[year] for year in future_years_sorted]
    
    ax.plot(future_years_sorted, future_prices, color='black', marker='X', label='Predicted Prices', lw=2)

    for future_year, future_price in predicted_prices.items():
        ax.text(future_year, future_price - 100, f"${future_price:.2f}", 
                fontsize=9, ha='center', va='bottom', color='black')

    historical_years = val["year"].values
    historical_prices = val["max_price"].dropna().values

    valid_mask = np.isfinite(val["max_price"].values)
    historical_years = historical_years[valid_mask]
    historical_prices = val["max_price"].values[valid_mask]

    # Filter to only include years >= 2008
    valid_year_mask = historical_years >= 2008
    historical_years = historical_years[valid_year_mask]
    historical_prices = historical_prices[valid_year_mask]

    all_years = np.concatenate([historical_years, future_years_sorted])
    all_prices = np.concatenate([historical_prices, future_prices])

    coefficients = np.polyfit(all_years, all_prices, 1)
    best_fit_line = np.poly1d(coefficients)

    x_fit = np.linspace(all_years.min(), all_years.max(), 100)
    y_fit = best_fit_line(x_fit)

    ax.plot(x_fit, y_fit, color='orange', ls="--", label='Best Fit Line', lw=2, alpha=0.4)

    ax.set_xlabel('Date')
    ax.set_ylabel('Price ($ USD)')
    ax.set_title('Apple Prices Over Time')

    yticks = np.arange(0, max(val['max_price'].max(), 2000), 100)
    ax.set_yticks(yticks)

    ax.set_ylim(bottom=399)

    start_year = val["year"].min()
    end_year = max(future_years)
    ax.set_xticks(range(start_year, end_year + 1))

    ax.legend()
    fig.tight_layout()
    plt.show()

# Set up the rows with all of the dates (preferably only the year)
rows = []  # years
for index in range(len(df_appleData)):
    row_df = df_appleData.iloc[index]
    release_date_str = row_df["release_date"]

    if "/" not in release_date_str:
        row_year = int(release_date_str[-4:])
    else:
        first_release = release_date_str.split("/")[0]
        first_release = first_release.split(" (")[0]
        row_year = int(first_release[-4:])
    
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

# Set up the future years for predictions
future_year = [2021, 2022, 2023, 2024, 2025, 2026, 2027, 2028]

# Generate the line graph with historical and predicted prices
lineGraph(df_graphData, future_year)