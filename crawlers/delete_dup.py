import pandas as pd


dF = pd.read_csv('restaurant_data_file.csv', header=None)
dF = dF.drop_duplicates()
# print(dF[6])
# print(len(dF))
dF.to_csv(path_or_buf = 'r_gulshan.csv',index=False)