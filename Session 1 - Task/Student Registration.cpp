#include <bits/stdc++.h>
#include <ext/pb_ds/tree_policy.hpp>
#include <ext/pb_ds/assoc_container.hpp>

using namespace std;
using namespace __gnu_pbds;

typedef long long ll;
typedef long double ld;
typedef tree<int, null_type, less<>, rb_tree_tag, tree_order_statistics_node_update> ordered_set;
const int N = 1e5 + 5, M = 1e9 + 7;
const ll OO = LLONG_MAX;
#define meme(v, x) memset(v , x , sizeof(v))
#define allr(v) (v).rbegin(), (v).rend()
#define all(v) (v).begin(), (v).end()
#define sz(v)  (int) (v).size()

ll myCeil(ll a, ll b) { return (a / b) + bool(a % b); }

string name, type, password;
double balance = 0.0;

void teacher() {
    cout << "Welcome teacher: " << name << '\n';
}

void student() {
    cout << "Welcome student: " << name << '\n';
}

void registration() {
    cout << "Enter your name" << '\n';
    cin >> name;
    cout << "Enter your password" << "\n";
    cin >> password;
    cout << "Enter your current balance" << '\n';
    cin >> balance;
    cout << "Teacher or Student ?" << '\n';
    cin >> type;
}

void login() {
    login_again:
    string newName, newPassword, newType;
    cout << "Enter your name" << '\n';
    cin >> newName;
    cout << "Enter your password" << '\n';
    cin >> newPassword;
    newType = type;
    transform(all(newType), newType.begin(), ::tolower);
    if (newName == name and newPassword == password) {
        if (newType == "teacher") {
            teacher();
        } else if (newType == "student") {
            student();
        }
    } else {
        cout << "Try again! :)" << '\n';
        goto login_again;
    }
}

void deposit() {
    double newBalance;
    cout << "Enter the new balance" << '\n';
    cin >> newBalance;
    balance += newBalance;
}

void withdraw() {
    withdraw_again:
    double newBalance;
    cout << "Enter the balance that you want to withdraw" << '\n';
    cin >> newBalance;
    if (newBalance > balance) {
        cout << "Error! Just enter a valid balance" << '\n';
        goto withdraw_again;
    } else {
        balance -= newBalance;
    }
}

int main() {
//  freopen("file.in", "r", stdin);
//  ios_base::sync_with_stdio(false), cin.tie(nullptr);
    int operation;
    cout << "Hello\nWelcome to our bank" << '\n';
    nice_try:
    cout << "Have an account ?\n1 - Login\n2 - Register\n";
    cin >> operation;
    if (operation == 1) {
        login();
    } else if (operation == 2) {
        registration();
        cout << "Let's go to login :)" << '\n';
        login();
    } else {
        cout << "Invalid input, Please try again :)" << '\n';
        cout << "**********************************" << '\n';
        goto nice_try;
    }
    char op;
    do {
        do_it_again:
        cout << "Choose one of these operations, Please!\n1 - Check Balance\n2 - Deposit\n3 - Withdraw\n4 - Exit"
             << '\n';
        cin >> operation;
        if (operation == 1) {
            cout << "You balance is: $" << balance << '\n';
            cout << "Wanna continue ? (Y/N)" << '\n';
            cin >> op;
            if (op == 'Y' or op == 'y') {
                cout << "**********************************" << '\n';
                goto do_it_again;
            } else if (op == 'N' or op == 'n') {
                cout << "See you later :)" << '\n';
                exit(0);
            } else {
                cout << "Can't understand, try again!" << '\n';
                goto do_it_again;
            }
        } else if (operation == 2) {
            deposit();
            cout << "Wanna continue ? (Y/N)" << '\n';
            cin >> op;
            if (op == 'Y' or op == 'y') {
                cout << "**********************************" << '\n';
                goto do_it_again;
            } else if (op == 'N' or op == 'n') {
                cout << "See you later :)" << '\n';
                exit(0);
            } else {
                cout << "Can't understand, try again!" << '\n';
                goto do_it_again;
            }
        } else if (operation == 3) {
            withdraw();
            cout << "Wanna continue ? (Y/N)" << '\n';
            cin >> op;
            if (op == 'Y' or op == 'y') {
                cout << "**********************************" << '\n';
                goto do_it_again;
            } else if (op == 'N' or op == 'n') {
                cout << "See you later :)" << '\n';
                exit(0);
            } else {
                cout << "Can't understand, try again!" << '\n';
                goto do_it_again;
            }
        } else if (operation == 4) {
            cout << "See you later :)" << '\n';
            exit(0);
        } else {
            cout << "Invalid input, Please try again :)" << '\n';
            cout << "**********************************" << '\n';
        }
    } while (operation != 4);
    return 0;
}