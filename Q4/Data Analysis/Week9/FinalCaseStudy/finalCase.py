import numpy as np
import matplotlib.pyplot as plt
import pandas as pd



# Load the data
appledata = pd.read_csv('Q4\Data Analysis\Week9\FinalCaseStudy\AppleDataRestructured.csv')
df_appleData = pd.DataFrame(appledata) 


def apple(model="all"):
    base = "iPhone " + model
    
    if model == "1":
        base = base[0:-1]

    return base

contract_prices = df_appleData["contract_launch_price"].dropna()
launch_prices = df_appleData["launch_price"].dropna()

def convertToValues(data):
    values = []
    if data != "nan":
        value1 = 0
        if data.find("/") != -1:
            if data.find("*") != -1:
                data[:-1]
            temp = data.split("/")
            value1 = int(temp[0][1:])
            value2 = int(temp[1][1:])
            try:
                value3 = int(temp[2][1:])
                return [value1, value2, value3]
            except:
                return [value1, value2]
        else:
            return [value1]
    else:
        return False

launch_prices = []
for i in range(0, df_appleData["launch_price"].count()):
    integers = convertToValues(str(df_appleData["launch_price"][i]))
    if integers != False:
        launch_prices.append(integers)

def scatterGraph(rows, columns):
    fig, ax = plt.subplots()
    for column in columns:
        ax.scatter(rows, column, alpha=0.3, edgecolors='w',)
    z = np.polyfit(rows, columns, 1)
    p = np.poly1d(z)

    plt.plot(rows, p(columns))

    #specify x-axis and y-axis labels
    ax.set_xlabel('Date')
    ax.set_ylabel('Price ($ USD)')
    ax.set_title('Apple Prices Over Time')
    ax.legend()
    plt.show()


#-------------FORMAT DATA TO DATA FRAME OR SERIES----------------

#Set up the rows with all of the dates (preferrably only the year)
rows = []

#Set up all of the columns with the values (You'll need three columns, one for each price)
columns = []


#Set up our prediction
pred_date = '2027' #Whatever date we want to predict goes here

pred_price = 0 #FV = PV*(1+r)^n FV = Future value, PV = past value, r = rate of change (we need to calculate), n = periods (future date - current date)
rows.append(pred_date)
columns.append(pred_price)

#End Result:
scatterGraph(rows, columns)
#----------------------------------------------------------------





