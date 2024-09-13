import numpy as np
import matplotlib.pyplot as plt
import pandas as pd
from matplotlib.widgets import Button

# Load the data
household_income = pd.read_csv('Q4\Data Analysis\Week7\cz_kfr_allSubgroups.csv')
np_household_income = pd.DataFrame(household_income)

incarceration = pd.read_csv('Q4\Data Analysis\Week7\cz_jail_allSubgroups.csv')
np_incarceration = pd.DataFrame(incarceration)

# Function to generate column names based on parameters
def gR(race="all", gender="all", perc="all", cohort="none"):
    base = ""
    match race:
        case "black":
            base += "rB"
        case "hispanic":
            base += "rH"
        case "asian":
            base += "rA"
        case "americanindian":
            base += "rNA"
        case "white":
            base += "rW"
        case __:
            base += "rP"
    base += "_"
    match gender:
        case "male":
            base += "gM"
        case "female":
            base += "gF"
        case __:
            base += "gP"
    base += "_"
    match perc:
        case 100:
            base += "p100"
        case 75:
            base += "p75"
        case 50:
            base += "p50"
        case 25:
            base += "p25"
        case 1:
            base += "p1"
        case __:
            base += "pall"
    match cohort:
        case "early":
            base += "_e"
        case "late":
            base += "_l"
    return base

# Button callback functions
def next(event):
    global start, end
    if end < len(dataPoints):
        start += 20
        end += 20
        update_plot(dataPoints)

def previous(event):
    global start, end
    if start > 0:
        start -= 20
        end -= 20
        update_plot(dataPoints)

# Setting up filters

#=======================================================================#
#           Insert filters into the dictionary below                    #
#  All filters must have a column name followed by the gR function      #
# gR() can take 4 parameters but each one is optional. It will return   #
# all if given no arguments                                             #
#=======================================================================#

filters = {
    "Black": gR(race="black", perc=100),
    "White": gR(race="white", perc=100),
}

graph = "histogram" #values can be histogram, bar, or scatter
distinction = "hhi" #change between household income (hhi) and incarceration rates (incar)
#DISTINCTION DOES NOT AFFECT THE SCATTER PLOT

# Create a new DataFrame with the filtered data
newDf = {"Name": np_household_income["name"]}
if graph == "histogram":
    filters["All"] = gR()
for filtername, filter in filters.items():
    filter = "kfr_" + filter
    newDf[filtername] = np_household_income[filter]
    if graph == "histogram" and distinction == "hhi":
        plt.hist(newDf[filtername], bins=20, alpha=0.7, label=filtername)
np_newDf = pd.DataFrame(newDf)
np_newDf = np_newDf.set_index("Name")

incarDf = {"Name": np_incarceration["name"]}
if graph == "histogram":
    filters["All"] = gR()
for filtername, filter in filters.items():
    filter = "jail_" + filter
    incarDf[filtername] = np_incarceration[filter]
    if graph == "histogram" and distinction == "incar":
        plt.hist(incarDf[filtername], bins=20, alpha=0.7, label=filtername)
np_incarDf = pd.DataFrame(incarDf)
np_incarDf = np_incarDf.set_index("Name")

# Update plot function
def update_plot(listname):
    ax.clear()  # Clear only the plot area
    labels = listname.index[start:end]
    bar_width = 0.2  # Width of each bar
    index = np.arange(len(labels))  # The x locations for the groups

    if distinction == "hhi":
        for i, column in enumerate(listname.columns):
            ax.bar(index + i * bar_width, listname[column][start:end], bar_width, alpha=0.7, label=column)
    else:
        for i, column in enumerate(listname.columns):
            ax.bar(index + i * bar_width, listname[column][start:end]*100, bar_width, alpha=0.7, label=column)

    ax.set_xticks(index + bar_width * (len(listname.columns) - 1) / 2)
    ax.set_xticklabels(labels, rotation=90)
    ax.set_xlabel("Commuting Zone")
    if distinction == "hhi":
        ax.set_ylabel("Average Household Income ($ Yearly)")
        ax.set_title("Household Income by Race and Gender")
    else:
        ax.set_ylabel("Incarceration Rate %")
        ax.set_title("Incarceration Rate by Race and Gender")
    
    ax.legend()
    plt.draw()


# Initialize the plot
if graph == "bar":
    start = 0
    end = 20
    fig, ax = plt.subplots()
    plt.subplots_adjust(bottom=0.2)

    if distinction == "hhi":
        dataPoints = np_newDf
    else:
        dataPoints = np_incarDf

    # Create the buttons
    ax_prev = plt.axes([0.7, 0.05, 0.1, 0.075])
    ax_next = plt.axes([0.81, 0.05, 0.1, 0.075])
    b_next = Button(ax_next, 'Next')
    b_prev = Button(ax_prev, 'Previous')
    b_next.on_clicked(next)
    b_prev.on_clicked(previous)

    # Initial plot update
    update_plot(dataPoints)

    plt.show()
elif graph == "histogram":
    plt.xlabel("Average Household Income ($ Yearly)")
    plt.ylabel("Number of Commuting Zones")
    plt.title("Household Income by Race and Gender")
    plt.legend()
    plt.show()
elif graph == "scatter":
    fig, ax = plt.subplots()
    for filtername, filter in filters.items():
        ax.scatter(np_incarDf[filtername]*100, 
                np_newDf[filtername], 
                label=filtername, 
                alpha=0.3, 
                edgecolors='w',
                )
    z = np.polyfit(np_incarDf[filtername]*100, np_newDf[filtername], 1)
    p = np.poly1d(z)

    plt.plot(np_incarDf[filtername]*100, p(np_incarDf[filtername]*100))

    #specify x-axis and y-axis labels
    ax.set_xlabel('Incarceration Rate %')
    ax.set_ylabel('Household Income ($ Yearly)')
    ax.set_title('Incarceration Rate vs. Household Income')
    ax.legend()
    plt.show()