# Jupyter Notebook code
import helpers
import pandas as pd
import numpy as np
import datetime as dt
from sklearn import preprocessing
from sklearn.model_selection import cross_val_score

SECONDS_IN_YEAR = (dt.datetime(2021, 1, 1) - dt.datetime(2020, 1, 1)).total_seconds()

def get_population_density(location):
    if location == "Kenosha;WI":
        return 1
    elif location == "Hackensack;NJ":
        return 2
    elif location == "St. Louis;MO":
        return 3
    elif location == "Ellicott City;MD":
        return 4
    elif location == "Baltimore;MD":
        return 5
    elif location == "Catonsville;MD":
        return 6
    elif location == "North Bethesda;MD":
        return 7
    elif location == "Los Angeles;CA":
        return 8
    elif location == "Columbia;MD":
        return 9

def get_SINE(date):
    seconds = (date - dt.datetime(2020, 1, 1, 0)).total_seconds()
    return np.sin(2 * np.pi * seconds / SECONDS_IN_YEAR)

def get_COSINE(date):
    seconds = (date - dt.datetime(2020, 1, 1, 0)).total_seconds()
    return np.cos(2 * np.pi * seconds / SECONDS_IN_YEAR)

def get_hour_difference(start_datetime, end_datetime):
    return (end_datetime - start_datetime).total_seconds() / 3600

# UberX
# Import file
import_file_UberX = "UberX_Los_Angeles_CA_V2.csv"
columns_UberX = ["Location", "Datetime", "NPEPH"]
df_UberX = pd.read_csv(import_file_UberX, names=columns_UberX)

# Change to numerical data
df_UberX["Location"] = df_UberX["Location"].map(get_population_density)
df_UberX["Datetime"] = pd.to_datetime(df_UberX["Datetime"], format="%Y-%m-%d", errors="coerce")
df_UberX["DayOfWeek"] = df_UberX["Datetime"].dt.dayofweek
df_UberX["Datetime"] = (df_UberX["Datetime"] - dt.datetime(2020, 1, 1)).dt.total_seconds()
df_UberX["Datetime_SINE"] = np.sin(2 * np.pi * df_UberX["Datetime"] / SECONDS_IN_YEAR)
df_UberX["Datetime_COSINE"] = np.cos(2 * np.pi * df_UberX["Datetime"] / SECONDS_IN_YEAR)
df_UberX = df_UberX[["Location", "Datetime_SINE", "Datetime_COSINE", "DayOfWeek", "NPEPH"]]

# Separate features and classes
feature_names_UberX = ["Location", "Datetime_SINE", "Datetime_COSINE", "DayOfWeek"]
all_features_UberX = df_UberX[feature_names_UberX].values
all_classes_NPEPH_UberX = df_UberX["NPEPH"].values

# Normalize data
scaler = preprocessing.StandardScaler()
all_features_scaled_UberX = scaler.fit_transform(all_features_UberX)

# Uber Eats
# Import file
import_file_Uber_Eats = "Uber_Eats_Columbia_MD_V2.csv"
columns = ["Location", "Datetime", "NPEPH"]
df_Uber_Eats = pd.read_csv(import_file_Uber_Eats, names=columns)

# Change to numerical data
df_Uber_Eats["Location"] = df_Uber_Eats["Location"].map(get_population_density)
df_Uber_Eats["Datetime"] = pd.to_datetime(df_Uber_Eats["Datetime"], format="%Y-%m-%d", errors="coerce")
df_Uber_Eats["DayOfWeek"] = df_Uber_Eats["Datetime"].dt.dayofweek
df_Uber_Eats["Datetime"] = (df_Uber_Eats["Datetime"] - dt.datetime(2020, 1, 1)).dt.total_seconds()
df_Uber_Eats["Datetime_SINE"] = np.sin(2 * np.pi * df_Uber_Eats["Datetime"] / SECONDS_IN_YEAR)
df_Uber_Eats["Datetime_COSINE"] = np.cos(2 * np.pi * df_Uber_Eats["Datetime"] / SECONDS_IN_YEAR)
df_Uber_Eats = df_Uber_Eats[["Location", "Datetime_SINE", "Datetime_COSINE", "DayOfWeek", "NPEPH"]]

# Separate features and classes
feature_names_Uber_Eats = ["Location", "Datetime_SINE", "Datetime_COSINE", "DayOfWeek"]
all_features_Uber_Eats = df_Uber_Eats[feature_names_Uber_Eats].values
all_classes_NPEPH_Uber_Eats = df_Uber_Eats["NPEPH"].values

# Normalize data
scaler = preprocessing.StandardScaler()
all_features_scaled_Uber_Eats = scaler.fit_transform(all_features_Uber_Eats)

# DoorDash
# Import file
import_file_DoorDash = "DoorDash_Combined_V2.csv"
columns_DoorDash = ["Start_Datetime", "Deliveries", "Location", "Total_Earnings", "DPH", "ID", "End_Datetime", "TEPH"]
df_DoorDash = pd.read_csv(import_file_DoorDash, names=columns_DoorDash)

# Change to numerical data
df_DoorDash["Location"] = df_DoorDash["Location"].map(get_population_density)
df_DoorDash["Start_Datetime"] = pd.to_datetime(df_DoorDash["Start_Datetime"], format="%Y-%m-%dT%H:%MZ", errors="coerce")
df_DoorDash["DayOfWeek"] = df_DoorDash["Start_Datetime"].dt.dayofweek
df_DoorDash["Start_Datetime"] = (df_DoorDash["Start_Datetime"] - dt.datetime(2020, 1, 1)).dt.total_seconds()
df_DoorDash["Start_Datetime_SINE"] = np.sin(2 * np.pi * df_DoorDash["Start_Datetime"] / SECONDS_IN_YEAR)
df_DoorDash["Start_Datetime_COSINE"] = np.cos(2 * np.pi * df_DoorDash["Start_Datetime"] / SECONDS_IN_YEAR)
df_DoorDash["End_Datetime"] = pd.to_datetime(df_DoorDash["End_Datetime"], format="%Y-%m-%dT%H:%MZ", errors="coerce")
df_DoorDash["End_Datetime"] = (df_DoorDash["End_Datetime"] - dt.datetime(2020, 1, 1)).dt.total_seconds()
df_DoorDash["End_Datetime_SINE"] = np.sin(2 * np.pi * df_DoorDash["End_Datetime"] / SECONDS_IN_YEAR)
df_DoorDash["End_Datetime_COSINE"] = np.cos(2 * np.pi * df_DoorDash["End_Datetime"] / SECONDS_IN_YEAR)
df_DoorDash = df_DoorDash[["Location", "Start_Datetime_SINE", "Start_Datetime_COSINE", "End_Datetime_SINE", "End_Datetime_COSINE", "DayOfWeek", "DPH", "TEPH"]]

# Separate features and classes
feature_names_DoorDash = ["Location", "Start_Datetime_SINE", "Start_Datetime_COSINE", "End_Datetime_SINE", "End_Datetime_COSINE", "DayOfWeek"]
all_features_DoorDash = df_DoorDash[feature_names_DoorDash].values
all_classes_TEPH_DoorDash = df_DoorDash["TEPH"].values

# Normalize data
scaler = preprocessing.StandardScaler()
all_features_scaled_DoorDash = scaler.fit_transform(all_features_DoorDash)

# Stats
# UberX
NPEPH_mean_UberX = df_UberX["NPEPH"].mean()
NPEPH_std_UberX = df_UberX["NPEPH"].std()
NPEPH_variance_UberX = NPEPH_std_UberX * NPEPH_std_UberX
# Uber Eats
NPEPH_mean_Uber_Eats = df_Uber_Eats["NPEPH"].mean()
NPEPH_std_Uber_Eats = df_Uber_Eats["NPEPH"].std()
NPEPH_variance_Uber_Eats = NPEPH_std_Uber_Eats * NPEPH_std_Uber_Eats
# DoorDash
TEPH_mean_DoorDash = df_DoorDash["TEPH"].mean()
TEPH_std_DoorDash = df_DoorDash["TEPH"].std()
TEPH_variance_DoorDash = TEPH_std_DoorDash * TEPH_std_DoorDash

# RBF SVM
from sklearn import svm

# Hyperparameters
C = 1.0

svr = svm.SVR(kernel="rbf", C=C)

# Return RBF SVM estimates and k-fold cross-validation scores for UberX
def get_RBF_SVM_UberX(location, datetime_SINE, datetime_COSINE, dayOfWeek):
    test_input = [[location, datetime_SINE, datetime_COSINE, dayOfWeek]]
    # NPEPH
    cv_scores = cross_val_score(svr, all_features_scaled_UberX, all_classes_NPEPH_UberX, cv=10)
    NPEPH_k = cv_scores.mean()
    svr.fit(all_features_scaled_UberX, all_classes_NPEPH_UberX)
    NPEPH = svr.predict(test_input)[0]
    NPEPH_array = [NPEPH, NPEPH_k, "NPEPH"]
    return [NPEPH_array]

# Return RBF SVM estimates and k-fold cross-validation scores for Uber Eats
def get_RBF_SVM_Uber_Eats(location, datetime_SINE, datetime_COSINE, dayOfWeek):
    test_input = [[location, datetime_SINE, datetime_COSINE, dayOfWeek]]
    # NPEPH
    cv_scores = cross_val_score(svr, all_features_scaled_Uber_Eats, all_classes_NPEPH_Uber_Eats, cv=10)
    NPEPH_k = cv_scores.mean()
    svr.fit(all_features_scaled_Uber_Eats, all_classes_NPEPH_Uber_Eats)
    NPEPH = svr.predict(test_input)[0]
    NPEPH_array = [NPEPH, NPEPH_k, "NPEPH"]
    return [NPEPH_array]

# Return RBF SVM estimates and k-fold cross-validation scores for DoorDash
def get_RBF_SVM_DoorDash(location, start_datetime_SINE, start_datetime_COSINE, end_datetime_SINE, end_datetime_COSINE, dayOfWeek):
    test_input = [[location, start_datetime_SINE, start_datetime_COSINE, end_datetime_SINE, end_datetime_COSINE, dayOfWeek]]
    # TEPH
    cv_scores = cross_val_score(svr, all_features_scaled_DoorDash, all_classes_TEPH_DoorDash, cv=10)
    TEPH_k = cv_scores.mean()
    svr.fit(all_features_scaled_DoorDash, all_classes_TEPH_DoorDash)
    TEPH = svr.predict(test_input)[0]
    TEPH_array = [TEPH, TEPH_k, "TEPH"]
    return [TEPH_array]

# Stats
from scipy.stats import norm
import math

# Server
from flask import Flask, jsonify, request
from flask_cors import CORS, cross_origin

app = Flask(__name__)
app.config["CORS_HEADERS"] = "Content-Type"
cors = CORS(app, resources={r"/*": {"origins": "*"}})

@app.route("/get_estimate", methods=["POST"])
@cross_origin()
def get_estimate():
    print("REQUEST", request)
    body = request.get_json()
    print("BODY", body)
    loc = body["location"]
    platform = body["platform"]
    start_date = body["start_date"]
    start_date_array1 = start_date.split("T")
    start_date_array2 = start_date_array1[0].split("-")
    start_date_year = int(start_date_array2[0])
    start_date_month = int(start_date_array2[1])
    start_date_day = int(start_date_array2[2])
    start_date_array3 = start_date_array1[1].split(":")
    start_date_hour = int(start_date_array3[0])
    end_date = body["end_date"]
    end_date_array1 = end_date.split("T")
    end_date_array2 = end_date_array1[0].split("-")
    end_date_year = int(end_date_array2[0])
    end_date_month = int(end_date_array2[1])
    end_date_day = int(end_date_array2[2])
    end_date_array3 = end_date_array1[1].split(":")
    end_date_hour = int(end_date_array3[0])
    print(loc, platform, start_date, end_date)
    if platform == "UberX":
        location = get_population_density(loc)
        datetime = dt.datetime(start_date_year, start_date_month, start_date_day, start_date_hour, 0)
        datetime_SINE = get_SINE(datetime)
        datetime_COSINE = get_COSINE(datetime)
        dayOfWeek = datetime.weekday()
        data = get_RBF_SVM_UberX(location, datetime_SINE, datetime_COSINE, dayOfWeek)
        estimate = round(data[0][0], 2)
        test_variance = round(NPEPH_variance_UberX, 2)
        return jsonify({ "estimate": estimate, "test_variance": test_variance })
    elif platform == "Uber_Eats":
        location = get_population_density(loc)
        datetime = dt.datetime(start_date_year, start_date_month, start_date_day, start_date_hour, 0)
        datetime_SINE = get_SINE(datetime)
        datetime_COSINE = get_COSINE(datetime)
        dayOfWeek = datetime.weekday()
        data = get_RBF_SVM_Uber_Eats(location, datetime_SINE, datetime_COSINE, dayOfWeek)
        estimate = round(data[0][0], 2)
        test_variance = round(NPEPH_variance_Uber_Eats, 2)
        return jsonify({ "estimate": estimate, "test_variance": test_variance })
    elif platform == "DoorDash":
        location = get_population_density(loc)
        start_datetime = dt.datetime(start_date_year, start_date_month, start_date_day, start_date_hour, 0)
        end_datetime = dt.datetime(end_date_year, end_date_month, end_date_day, end_date_hour, 0)
        start_datetime_SINE = get_SINE(start_datetime)
        start_datetime_COSINE = get_COSINE(start_datetime)
        end_datetime_SINE = get_SINE(end_datetime)
        end_datetime_COSINE = get_COSINE(end_datetime)
        dayOfWeek = start_datetime.weekday()
        data = get_RBF_SVM_DoorDash(location, start_datetime_SINE, start_datetime_COSINE, end_datetime_SINE, end_datetime_COSINE, dayOfWeek)
        estimate = round(data[0][0], 2)
        test_variance = round(TEPH_variance_DoorDash, 2)
        return jsonify({ "estimate": estimate, "test_variance": test_variance })

@app.route("/get_premium", methods=["POST"])
@cross_origin()
def get_premium():
    body = request.get_json()
    total = float(body["total"])
    variance = float(body["variance"])
    if variance < 0.01:
        std = 0
    else:
        std = math.sqrt(variance)
    base = norm(loc=total, scale=std)
    premium = round(base.expect(lambda x: abs(x - total), lb=0, ub=total), 2)
    if math.isnan(premium):
        premium = 0
    return jsonify({ "premium": premium })

if __name__ == "__main__":
    app.run(host="0.0.0.0", port=5000)